<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\Redirect;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ChangeNewsSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug-admin:change {old_slug} {new_slug}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating a old slug to a new one';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $old_slug = $this->argument('old_slug');
        $new_slug = $this->argument('new_slug');

        $old_url = route('news_item', ['slug' => $old_slug], false);
        $new_url = route('news_item', ['slug' => $new_slug], false);

        $this->table(
            ['Old slug', 'New slug'],
            [[$old_slug, $new_slug]]
        );
        $this->line('Changing starting...' .PHP_EOL);

        if ($old_slug === $new_slug) {
            $this->error('Sorry, Your slugs are the same. Change another name for old slug.');
            return 1;
        }


        $db_check = Redirect::query()
            ->where('old_slug', $old_url)
            ->where('new_slug', $new_url)
            ->first();
        if (!($db_check === null)) {
            $this->error('Sorry, the same record found in DB. Change another names for slugs.');
            return 1;
        }

        $db_check = News::where('slug', $old_slug)->first();
        if ($db_check === null) {
            $this->error("Sorry, the news with the specified slug didn't found in DB. Please, enter correct slug name.");
            return 1;
        }

        DB::transaction(function () use ($new_slug, $new_url, $db_check) {
            Redirect::where('old_slug', $new_url)->delete();
            $db_check->slug = $new_slug;
            $db_check->save();
        });


        $this->info('New slug \'' . $new_slug . '\' successfully set!');
        $this->line('Old url: '.$old_url);
        $this->line('New url: '.$new_url);
        return 0;
    }
}
