<x-app-layout page-class="homepage" page-title="Jewelry CG">

<section class="hero-home py-8">
    <div class="container">
        <div class="row hero-content-container">
            <div class="col-lg-6 mx-auto text-center">
                <h4 class="fs-20 text-white pb-4 mb-0">The world's preferred source for Jewelry CG content</h4>
                <h1 class="text-white font-weight-bold pb-4 mb-0">Explore our vast collections of 3D models</h1>
                <div class="search-form ml-auto mr-auto py-2">
                    <form method="get" action="{{route('search')}}">
                        <div class="search-col">
                            <input name="q" type="search" placeholder="Search" aria-label="Search" class="search-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-media" id="hero-media">
      <video class="hero-media-asset is-visible" autoplay="" muted="" loop="" playsinline="" data-hero-video="" data-src-lg="https://cdn.dribbble.com/uploads/39417/original/49dbf46eae15d227fc95a69cee31251e.mp4?1657824906" data-src-sm="https://cdn.dribbble.com/uploads/39418/original/0cc960a3bf612d0badc4f6165eb36f7b.mp4?1657824915">
        <source src="https://cdn.dribbble.com/uploads/39417/original/49dbf46eae15d227fc95a69cee31251e.mp4?1657824906" type="video/mp4">
      </video>
    </div>
</section>
<!--
<section class="why-points top-content-container pt-4 pb-4">
    <div class="container">
        <div class="row">
            <div class="overflow-hidden col-md-4 position-relative mt-3">
                <div class="card mb-0">
                    <div class="d-block w-100 h-100 px-4 pt-4 pb-5">
                        <h2 class="text-black fw-700">Custom Design</h2>
                        <p class="text-black h6 font-weight-light" style="line-height: 1.5"> Anything you have in mind we can create! Do you have a ring, chain, or pendant idea in mind? Let us know and we can create a 3D model so it can be created. </p> <a href="https://districtties.com/product/custom-cad" class="btn btn-primary mt-4">Custom CAD Inquiry <i class="fa-solid fa-arrow-right"></i></a> </div>
                </div>
            </div>
            <div class="overflow-hidden col-md-4 position-relative mt-3">
                <div class="card mb-0 h-100">
                    <div class="d-block w-100 h-100 px-4 pt-4 pb-5">
                        <h2 class="text-black fw-700">Knowledge Base Blog</h2>
                        <p class="text-black h6 font-weight-light" style="line-height: 1.5"> Learn the behind the scenes process of how jewelry is made from start to finish. </p> <a class="btn btn-primary mb-3 mt-2" href="https://districtties.com/blog/category/knowledge-base">View Blog <i class="fa-solid fa-arrow-right"></i></a> </div>
                </div>
            </div>
            <div class="overflow-hidden col-md-4 position-relative mt-3">
                <div class="card mb-0 h-100">
                    <div class="d-block w-100 h-100 px-4 pt-4 pb-5">
                        <h2 class="text-black fw-700">Cost Analysis Blog</h2>
                        <p class="text-black h6 font-weight-light" style="line-height: 1.5"> See us breakdown what some of the most popular jewelry cost to make. </p> <a class="btn btn-primary mb-3 mt-2" href="https://districtties.com/blog/category/cost-analysis">View Blog <i class="fa-solid fa-arrow-right"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<section class="home_latest_product mt-4 mb-4">
    <div class="container">
        <x-products-display :products="$products"/>
    </div>
</section>
</x-app-layout>
