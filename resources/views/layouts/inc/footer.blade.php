@php
    $front = App\Models\FrontControl::first();
    $categories = App\Models\Category::where('status', 1)->take(8)->get();
@endphp

<footer class=" pb-3">
    <div class="row container mx-auto pt-5">

      <div class="footer-one col-lg-3 col-md-6 col-12">
        <img style="height: 50px" src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="">
        <p class="pt-3">{{$front->footer_text}} </p>
      </div>

      <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
        <h5 class="pb-2">Top Featured</h5>
        <ul class="text-uppercase list-unstyled">
            @foreach ($categories as $row)
                <li><a
                        href="{{ url('category_product_show/' . $row->id) }}">{{ $row->category_name }}
                      </a>
                </li>
            @endforeach
        </ul>
      </div>

      <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
        <h5 class="pb-2">Contact Us</h5>

        <div>
          <h6 class="text-uppercase">Address</h6>
          <p>{{$front->footer_contact_address}}</p>
        </div>

        <div>
          <h6 class="text-uppercase">Phone</h6>
          <p>{{$front->footer_contact_phone}}</p>
        </div>

        <div>
          <h6 class="text-uppercase">Email</h6>
          <p class="text-lowercase">{{$front->footer_contact_email}}</p>
        </div>

      </div>

      <div class="footer-one col-lg-3 col-md-6 col-12">
        <h5 class="pb-2">Our Items</h5>
        <div class="row">
          <img style="height: 50px; width: 100px;" class="img-fluid  m-2" src="{{ asset('img_DB/front/footer_iteam/item1/' . $front->footer_iteam_img_1) }}" alt="">
          <img style="height: 50px; width: 100px;" class="img-fluid  m-2" src="{{ asset('img_DB/front/footer_iteam/item2/' . $front->footer_iteam_img_2) }}">
          <img style="height: 50px; width: 100px;" class="img-fluid  m-2" src="{{ asset('img_DB/front/footer_iteam/item3/' . $front->footer_iteam_img_3) }}">
          <img style="height: 50px; width: 100px;" class="img-fluid  m-2" src="{{ asset('img_DB/front/footer_iteam/item4/' . $front->footer_iteam_img_4) }}">
          <img style="height: 50px; width: 100px;" class="img-fluid  m-2" src="{{ asset('img_DB/front/footer_iteam/item5/' . $front->footer_iteam_img_5) }}">
          <img style="height: 50px; width: 100px;" class="img-fluid  m-2" src="{{ asset('img_DB/front/footer_iteam/item6/' . $front->footer_iteam_img_6) }}">
        </div>
      </div>

    </div>

    <div class="copyright mt-4">
      <div class="row container mx-auto">


        <div class="col-lg-6  col-12 text-nowrap mb-2">
          <p>Online-Marketing eCommerce © 2022. All Rigths Reserved</p>
        </div>

        <div class="col-lg-6  col-12">
          <a href="{{$front->footer_social_fb}}"><i class="fab fa-facebook-f"></i></a>
          <a href="{{$front->footer_social_twitter}}"><i class="fab fa-twitter"></i></a>
          <a href="{{$front->footer_social_linkedin}}"><i class="fab fa-linkedin-in"></i></a>
          <a href="{{$front->footer_social_insta}}"><i class="fab fa-instagram"></i></a>
        </div>


      </div>
    </div>
  </footer>