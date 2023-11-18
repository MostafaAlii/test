<?php

namespace App\Http\Controllers\Frontend;

use App\Models\{Home, Feature, Couple, Blog, Icon, About, Button, Slider, Slide,Service, Comment,Gallery, Partner};
use App\Http\Controllers\Controller;

class FrontController extends Controller {
    public function index() {
        $data = [];
        $data['sliders'] = Slider::active()->latest()->get();
        $data['slides'] = Slide::active()->latest()->get();
        $data['partners'] = Partner::active()->latest()->get();
        $data['icons'] = Icon::active()->get();
        $data['home'] = Home::first();
        $data['about'] = About::first();
        $data['services'] = Service::eight()->latest()->get();
        $data['header_btn'] = Button::whereType('header')->get();
        $data['services_btn'] = Button::whereType('service')->get();
        $data['comments'] = Comment::active()->latest()->get();
        $data['couple'] = Couple::first();
        $data['feature'] = Feature::first();
        $data['servicesWithGallery'] = Service::with('gallary')->active()->get();
        $data['mediaGallery'] = Gallery::with('images')->get();
        $data['blogs'] = Blog::active()->latest()->take(5)->get();
        return view('website.home', $data);
    }
}