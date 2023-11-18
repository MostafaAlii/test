</div>
<!-- Body End -->
<footer class="py-4 bg-dark text-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <p>
            {{ $settings?->notes }}
          </p>
          <div class="social-media-icons">
            <a href="{{ $settings?->twitter }}" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/733/733635.png" width="24px"
                alt="Twitter" /></a>
            <a href="{{ $settings?->facebook }}" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/3128/3128208.png" width="31px"
                alt="Facebook" /></a>
            <a href="{{ $settings?->google }}" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/104/104093.png" width="24px"
                alt="Google" /></a>
            <a href="{{ $settings?->linkedin }}" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/3128/3128219.png" width="24px"
                alt="LinkedIn" /></a>

            <!-- Add more social media icons as needed -->
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5>Useful Links</h5>
          <ul class="list-unstyled">
            <li>
              <a href="#"><span style="font-weight: 800"> </span>About Artisticretouch</a>
            </li>
            <li>
              <a href="#"><span style="font-weight: 800"> </span>Terms & Condition</a>
            </li>
            <li>
              <a href="#"><span style="font-weight: 800"> </span>Privacy Policy</a>
            </li>
            <li>
              <a href="#"><span style="font-weight: 800"> </span>Contact us</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 col-md-6">
          <h5>Contact Information</h5>
          <ul class="list-styled">
            <li style="display: flex; align-items: center">
              <i class="fa fa-envelope" style="font-size: 28px; color: red; margin-right: 10px"></i>
              <a href="mailto:{{ $settings?->email }}" style="
                    color: #909090;
                    font-weight: 500;
                    text-decoration: none;
                  ">{{ $settings?->email }}</a>
            </li>
          </ul>
          <h5>We Accept</h5>
          <img src="{{ asset('website/resources/imgs/acc.jpg') }}" class="img-fluid" alt="Accepted Payment Methods" />
        </div>
      </div>
      <div class="mt-3 text-center">
        <p style="
              background-color: #191919;
              color: white;
              padding: 5px;
              font-size: 15px;
            ">
          Copyright 2023 by <a target="_blank" style="text-decoration: none; color:white;" href="https://www.tag-soft.com"> TagSoft </a> | All Rights Reserved
        </p>
      </div>
    </div>
</footer>