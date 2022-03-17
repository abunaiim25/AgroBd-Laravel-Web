@extends('layouts.admin_layout')

@section('title')
    Admin - Frontend Design
@endsection

@section('admin_content')
    <nav class="breadcrumb sl-breadcrumb mt-3">
        <p>Admin Panel / Frontend Design</p>
    </nav>

    <div class="card mx-3 p-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 ">



                <form action="{{ url('front_control_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div style="display: flex; justify-content: space-between;" class="mb-2">
                        <h6 class="card-body-title mb-4"> Frontend Design</h6>
                        <button class="btn btn-info mg-r-5">Update</button>
                    </div>


                    {{-- LOGO --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong> LOGO</strong>
                        </div>

                        <div class="row p-3">
                            <div class="col-lg-6 col-lg-6 p-3">
                                <label for="" class="text-black"><strong> Simple Logo:</strong></label>
                                <img style="height: 60px" src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="">
                                <input class="form-control" type="file" name="logo_big">
                            </div>

                            <div class="col-lg-6 col-lg-6 p-3">
                                <label for="" class="text-black"><strong> Small Logo:</strong></label>
                                <img style="height: 40px" src="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" alt="">
                                <input class="form-control" type="file" name="logo_small">
                            </div>
                        </div>

                    </div>


                    {{-- Home Background --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>Home
                                Background</strong> </div>

                        <div class="row p-3">
                            <div class="col-lg-4 col-lg-4 ">
                                <label for="" class="text-black"><strong>Home Background Image:</strong></label>
                                <img src="{{ asset('img_DB/front/home/' . $front->home_bg_img) }}" alt="">
                                <input class="form-control mt-1 text-success" type="file" name="home_bg_img">
                            </div>

                            <div class="col-lg-8 col-lg-8 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>Home Background
                                                Text-1:</strong></label>
                                        <input type="text" name="home_bg_txt1" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="20" value="{{$front->home_bg_txt1}}"
                                            placeholder="short text (maximum 20 letters supported)">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>Home Background
                                                Text-2:</strong></label>
                                        <input type="text" name="home_bg_txt2" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="20" value=" {{$front->home_bg_txt2}}"
                                            placeholder="short text (maximum 20 letters supported)">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>Home Background
                                                Text-3:</strong></label>
                                        <input type="text" name="home_bg_txt3" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="100" value=" {{$front->home_bg_txt3}}"
                                            placeholder="short text (maximum 100 letters supported)">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- Home Section Category --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>Home Section
                                Category</strong> </div>

                        <div class="row p-3">

                            <div class="col-lg-4 col-lg-4 mb-3">
                                <label for="" class="text-black"><strong>Shopping Here</strong></label>
                                <img style="height: 250px" src="{{ asset('img_DB/front/new/new1/' . $front->home_new_txt1_img) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="home_new_txt1_img">
                            </div>

                            <div class="col-lg-4 col-lg-4 mb-3">
                                <label for="" class="text-black"><strong>News Here</strong></label>
                                    <img style="height: 250px"  src="{{ asset('img_DB/front/new/new2/' . $front->home_new_txt2_img) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="home_new_txt2_img">
                            </div>

                            <div class="col-lg-4 col-lg-4 mb-3">
                                <label for="" class="text-black"><strong>Contact Here</strong></label>
                                    <img style="height: 250px"  src="{{ asset('img_DB/front/new/new3/' . $front->home_new_txt3_img) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="home_new_txt3_img">
                            </div>

                        </div>

                    </div>


                    {{-- Home Banner --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>Home
                                Banner</strong> </div>

                        <div class="row p-3">
                            <div class="col-lg-4 col-lg-4 ">
                                <label for="" class="text-black"><strong>Home Banner Image:</strong></label>
                                <img src="{{ asset('img_DB/front/home_banner/' . $front->home_banner_img) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="home_banner_img">
                            </div>

                            <div class="col-lg-8 col-lg-8 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>Home Banner Text-1:</strong></label>
                                        <input type="text" name="home_banner_txt1" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="20" value="{{$front->home_banner_txt1}}"
                                            placeholder="short text (maximum 20 letters supported)">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>Home Banner Text-2:</strong></label>
                                        <input type="text" name="home_banner_txt2" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="50" value="{{$front->home_banner_txt2}}"
                                            placeholder="short text (maximum 50 letters supported)">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- Shop Banner --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>Shop
                                Banner</strong> </div>

                        <div class="row p-3">
                            <div class="col-lg-4 col-lg-4 ">
                                <label for="" class="text-black"><strong>Shop Banner Image:</strong></label>
                                <img src="{{ asset('img_DB/front/shop_banner/' . $front->shop_banner_img) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="shop_banner_img">
                            </div>

                            <div class="col-lg-8 col-lg-8 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>Home Shop Text-1:</strong></label>
                                        <input type="text" name="shop_banner_txt1" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="20" value="{{$front->shop_banner_txt1}}"
                                            placeholder="short text (maximum 20 letters supported)">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>Home Shop Text-2:</strong></label>
                                        <input type="text" name="shop_banner_txt2" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="50" value="{{$front->shop_banner_txt2}}"
                                            placeholder="short text (maximum 50 letters supported)">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- About Banner --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>About
                                Banner</strong> </div>

                        <div class="row p-3">
                            <div class="col-lg-4 col-lg-4 ">
                                <label for="" class="text-black"><strong>About Banner Image:</strong></label>
                                <img src="{{ asset('img_DB/front/about_banner/' . $front->about_banner_img) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="about_banner_img">
                            </div>

                        </div>
                    </div>


                    {{-- Contact Banner --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>Contact
                                Banner</strong> </div>

                        <div class="row p-3">
                            <div class="col-lg-4 col-lg-4 ">
                                <label for="" class="text-black"><strong>Contact Banner Image:</strong></label>
                                <img src="{{ asset('img_DB/front/contact_banner/' . $front->contact_banner_img) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="contact_banner_img">
                            </div>

                        </div>
                    </div>


                    {{-- My Order Banner --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>My Order
                                Banner</strong> </div>

                        <div class="row p-3">
                            <div class="col-lg-4 col-lg-4 ">
                                <label for="" class="text-black"><strong>My Order Banner Image:</strong></label>
                                <img src="{{ asset('img_DB/front/myorder_banner/' . $front->myorder_banner_img) }}" alt="">
                                <input class="form-control mt-1 text-success" type="file" name="myorder_banner_img">
                            </div>

                            <div class="col-lg-8 col-lg-8 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>My Order Text-1:</strong></label>
                                        <input type="text" name="myorder_banner_txt1" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="20" value="{{$front->myorder_banner_txt1}}"
                                            placeholder="short text (maximum 20 letters supported)">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="" class="text-black"><strong>My Order Text-2:</strong></label>
                                        <input type="text" name="myorder_banner_txt2" class="form-control bg-white mb-3"
                                            style="color: black;" maxlength="50"  value="{{$front->myorder_banner_txt2}}"
                                            placeholder="short text (maximum 50 letters supported)">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="card mb-3" style="background:#fff;">
                        <div class="card-header" style="background:greenyellow; color:black;"><strong>Footer
                            </strong> </div>

                        <div class="row p-3">

                            <div class="col-lg-4">
                                <label for="" class="text-black"><strong>Footer Address:</strong></label>
                                <input type="text" name="footer_contact_address" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="address" value="{{$front->footer_contact_address}}">
                            </div>
                            <div class="col-lg-4">
                                <label for="" class="text-black"><strong>Footer Phone:</strong></label>
                                <input type="text" name="footer_contact_phone" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="phone"  value="{{$front->footer_contact_phone}}">
                            </div>
                            <div class="col-lg-4">
                                <label for="" class="text-black"><strong>Footer Email:</strong></label>
                                <input type="text" name="footer_contact_email" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="email"  value="{{$front->footer_contact_email}}">
                            </div>



                            <div class="col-lg-4 col-6">
                                <label for="" class="text-black"><strong>Our Item Image-1:</strong></label>
                                <img style="height: 200px; width:150px;" src="{{ asset('img_DB/front/footer_iteam/item1/' . $front->footer_iteam_img_1) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="footer_iteam_img_1">
                            </div>
                            <div class="col-lg-4  col-6">
                                <label for="" class="text-black"><strong>Our Item Image-2:</strong></label>
                                <img style="height: 200px; width:150px;" src="{{ asset('img_DB/front/footer_iteam/item2/' . $front->footer_iteam_img_2) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="footer_iteam_img_2">
                            </div>
                            <div class="col-lg-4  col-6">
                                <label for="" class="text-black"><strong>Our Item Image-3:</strong></label>
                                <img style="height: 200px; width:150px;" src="{{ asset('img_DB/front/footer_iteam/item3/' . $front->footer_iteam_img_3) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="footer_iteam_img_3">
                            </div>
                            <div class="col-lg-4  col-6">
                                <label for="" class="text-black"><strong>Our Item Image-4:</strong></label>
                                <img style="height: 200px; width:150px;" src="{{ asset('img_DB/front/footer_iteam/item4/' . $front->footer_iteam_img_4) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="footer_iteam_img_4">
                            </div>
                            <div class="col-lg-4  col-6">
                                <label for="" class="text-black"><strong>Our Item Image-5:</strong></label>
                                <img  style="height: 200px; width:150px;"src="{{ asset('img_DB/front/footer_iteam/item5/' . $front->footer_iteam_img_5) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="footer_iteam_img_5">
                            </div>
                            <div class="col-lg-4 col-6 ">
                                <label for="" class="text-black"><strong>Our Item Image-6:</strong></label>
                                <img style="height: 200px; width:150px;" src="{{ asset('img_DB/front/footer_iteam/item6/' . $front->footer_iteam_img_6) }}" alt="">
                                <input class="form-control mt-1  text-success" type="file" name="footer_iteam_img_6">
                            </div>


                            <div class="col-lg-6">
                                <label for="" class="text-black"><strong>Facebook Link:</strong></label>
                                <input type="text" name="footer_social_fb" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="link" value="{{$front->footer_social_fb}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="text-black"><strong>Twitter Link:</strong></label>
                                <input type="text" name="footer_social_twitter" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="link" value="{{$front->footer_social_twitter}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="text-black"><strong>LinkedIn Link:</strong></label>
                                <input type="text" name="footer_social_linkedin" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="link" value="{{$front->footer_social_linkedin}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="text-black"><strong>Instagram Link:</strong></label>
                                <input type="text" name="footer_social_insta" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="link" value="{{$front->footer_social_insta}}">
                            </div>

                            <div class="col-lg-12">
                                <label for="" class="text-black"><strong>Footer Description:</strong></label>
                                <input type="text" name="footer_text" class="form-control bg-white mb-3"
                                    style="color: black;" placeholder="footer description" value="{{$front->footer_text}}">
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
