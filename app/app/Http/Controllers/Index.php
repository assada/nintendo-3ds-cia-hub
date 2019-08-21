<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Model\GameFactory;
use App\Model\GameMetadataFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Index
 *
 * @package App\Http\Controllers
 */
class Index extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome', ['games' => $this->getGames()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('add');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) //TODO: Create custom request
    {
        $folderName = 'cia/' . Str::slug($request->get('name'));

        $metadata = json_encode($request->all(['name', 'image', 'eshop', 'region']));

        Storage::disk('public')->put($folderName . '/game.json', $metadata);

        if ($request->hasFile('game')) {
            $request->file('game')->storeAs($folderName, 'game.cia', 'public');
        } else {
            return back()->withInput()->with('error', 'Some error...');
        }

        return redirect('/')->with('status', 'Task was successful!');
    }

    /**
     * @return Collection
     */
    private function getGames(): Collection
    {
        $c = new Collection();

        (new Collection(Storage::disk('public')->allDirectories('cia')))->each(static function ($gameDir) use ($c) {
            $game = Cache::remember($gameDir, 60 * 60 * 24 * 10, static function () use ($gameDir) {
                return (new GameFactory(new GameMetadataFactory()))->get($gameDir);
            });

            if (null !== $game) {
                $c->add($game);
            }
        });

        return $c;
    }
}
