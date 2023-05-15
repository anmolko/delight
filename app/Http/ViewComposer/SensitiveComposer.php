<?php


namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;

class SensitiveComposer
{
    public function compose(View $view){

        $topNav           = Menu::where('location',1)->first();
        $footerMenu       = Menu::where('location',2)->first();
        $topNavItems      = json_decode(@$topNav->content);
        $footerMenuItems  = json_decode(@$footerMenu->content);
        $topNavItems      = @$topNavItems[0];
        $footerMenuItems  = @$footerMenuItems[0];

        if(!empty(@$topNavItems)){
          foreach($topNavItems as $menu){
            $menu->title = MenuItem::where('id',$menu->id)->value('title');
            $menu->name = MenuItem::where('id',$menu->id)->value('name');
            $menu->slug = MenuItem::where('id',$menu->id)->value('slug');
            $menu->target = MenuItem::where('id',$menu->id)->value('target');
            $menu->type = MenuItem::where('id',$menu->id)->value('type');
            if(!empty($menu->children[0])){
              foreach ($menu->children[0] as $child) {
                $child->title = MenuItem::where('id',$child->id)->value('title');
                $child->name = MenuItem::where('id',$child->id)->value('name');
                $child->slug = MenuItem::where('id',$child->id)->value('slug');
                $child->target = MenuItem::where('id',$child->id)->value('target');
                $child->type = MenuItem::where('id',$child->id)->value('type');
                  if(!empty($child->children[0])){
                      foreach ($child->children[0] as $lastchild) {
                          $lastchild->title = MenuItem::where('id',$lastchild->id)->value('title');
                          $lastchild->name = MenuItem::where('id',$lastchild->id)->value('name');
                          $lastchild->slug = MenuItem::where('id',$lastchild->id)->value('slug');
                          $lastchild->target = MenuItem::where('id',$lastchild->id)->value('target');
                          $lastchild->type = MenuItem::where('id',$lastchild->id)->value('type');
                      }
                  }
              }
            }
          }

        }

        if(!empty(@$footerMenuItems)){
          foreach($footerMenuItems as $menu){
            $menu->title = MenuItem::where('id',$menu->id)->value('title');
            $menu->name = MenuItem::where('id',$menu->id)->value('name');
            $menu->slug = MenuItem::where('id',$menu->id)->value('slug');
            $menu->target = MenuItem::where('id',$menu->id)->value('target');
            $menu->type = MenuItem::where('id',$menu->id)->value('type');
          }

        }

        $latestPostsfooter = Blog::orderBy('created_at', 'DESC')->where('status','publish')->take(2)->get();
        $servicesfooter = ServiceCategory::orderBy(\DB::raw('RAND()'))->take(5)->get();


        $theme_data = Setting::first();
        $view
        ->with('setting_data', $theme_data)
        ->with('latestPostsfooter', $latestPostsfooter)
        ->with('servicesfooter', $servicesfooter)
        ->with('footer_nav_data', $footerMenuItems)
        ->with('top_nav_data', $topNavItems);


    }
}
