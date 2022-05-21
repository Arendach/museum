<footer class="pt-60 footer-main">
    <div class="footer-links mb-20 d-inline-block w-100 pb-60">
        <div class="container">
            <ul class="list-inline text-center">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">About us</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">Project</a></li>
                <li class="list-inline-item"><a href="#">Blog</a></li>
                <li class="list-inline-item"><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                    <p class="copyright mb-0 text-lg-start text-md-start text-sm-start text-center">
                        © <span class="copyright-year"></span> {{ mb_strtoupper(request()->getHost()) }} {{ date('Y') }}
                    </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-lg-end text-md-end text-sm-end text-center mb-20">
                    <ul class="footer-social list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="#" class="scroll-top"><i class="fas fa-chevron-up"></i></a>

<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="searchmodal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

