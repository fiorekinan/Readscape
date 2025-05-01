<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mycss/styles.css')}}">
</head>

<body>
    {{-- navbar --}}
    <header class="header fixed-top">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h3 class="m-0">Readscape</h3>
            <nav>
                <a href="#books" class="mx-2 text-dark fw-semibold">Lastest Books</a>
                <a href="#categories" class="mx-2 text-dark fw-semibold">Category</a>
                <a href="#testimonials" class="mx-2 text-dark fw-semibold">Testimoni</a>
                <a href="#cta" class="button btn text-dark ms-3 fw-semibold px-4 py-1">Sign Up</a>
            </nav>
        </div>
    </header>

    {{-- hero --}}
   <section class="hero text-center">
        <div class="container-fluid">
            <div class="row min-vh-80 hero-section">
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-start p-5">
                    <h1 class="text-start w-75 fs-1 fw-semibold">Explore countless stories and discover your perfect book.</h1>
                    <p class="text-start w-75 fs-5">Dive into a world of stories, knowledge, and inspiration — right at your fingertips.</p>
                    <a href="#books" class="button btn fw-semibold px-4 py-1">View Latest Books</a>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center position-relative">
                    <img width="600" src="{{ asset('purple/assets/hero-img.png')}}" alt="" class="mt-auto">
                </div>
            </div>
            
        </div iv>
    </section>

    {{-- why choose us --}}
    <section id="features" class="py-5">
        <div class="container text-center">
          <h2 class="text-gray-900 mb-4 fw-semibold">What Makes Us Special?</h2>
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card feature-card p-2 h-100">
                <i class="mdi mdi-book-open-page-variant text-gray-900 fs-1 mb-3"></i>
                <h5 class="mt-0">Find It All</h5>
                <p class="mt-0">From knowledge to imagination — everything you need is right at your fingertips.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card feature-card p-2 h-100">
                <i class="mdi mdi-cellphone-link text-gray-900 fs-1 mb-3"></i>
                <h5 class="mt-0">Easy Access</h5>
                <p class="mt-0">Open and easily read our collection anytime, anywhere, right from your device.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card feature-card p-2 h-100">
                <i class="mdi mdi-account-group text-gray-900 fs-1 mb-3"></i>
                <h5 class="mt-0">Learning for All</h5>
                <p class="mt-0">Students and teachers can access resources tailored to their individual needs.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      

    {{-- lastest books --}}
    <section id="books" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 fw-semibold">Latest Books</h2>
            <div class="row">
                @foreach($books->take(4) as $book)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" style="border-bottom: 3px solid black">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->author}}</p>
                            {{-- <p class="card-text">{{ Str::limit($book->description, 100) }}</p> --}}
                            <span class="badge badge-custom">{{ $book->category->name }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('book') }}" class="btn button fw-semibold">See All Books</a>
            </div>
        </div>
    </section>

    {{-- category --}}
    <section id="categories" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-semibold">Book Categories</h2>
            <div class="row justify-content-center">
                @foreach ($categories as $category)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card border border-black border-3 h-100 category-card text-center">
                        <div class="card-body">
                            <div class="category-icon mb-3">
                                <i class="bi bi-journal-album fs-1"></i>
                            </div>
                            <h5 class="card-title text-dark">{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- testi --}}
    <section id="testimonials" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4 fw-semibold">Hear Their Thoughts</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card feature-card-testi p-2 h-100">
                        <blockquote class="blockquote">
                            <p>“Studying's way easier and way more fun with — I actually enjoy learning now!”</p>
                            <footer class="blockquote-footer text-dark mt-2">Hilwa, Programming Student</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card-testi p-2 h-100">
                        <blockquote class="blockquote">
                            <p>“An excellent resource that supports both teaching and learning.”</p>
                            <footer class="blockquote-footer text-dark mt-2">Ummi, Programming Teacher</footer>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card-testi p-2 h-100">
                        <blockquote class="blockquote">
                            <p>“A huge help for finding references quickly anytime I need.”</p>
                            <footer class="blockquote-footer text-dark mt-2">Fatimah, Designer Student</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- cta --}}
    <section id="cta" class="py-5 text-center" style="background-color: #ECEEE9;">
        <div class="container text-dark">
            <h2 class="mb-3 fw-semibold">Ready to Find Your Next Favorite Book?</h2>
            <p>Sign up today and start exploring stories, ideas, and more — all in one place.</p>
            <a href="{{ route('login') }}" class="btn button fw-semibold">Get Started</a>
        </div>
    </section>

    {{-- footer --}}
    <footer class="bg-black text-white py-4">
        <div class="container d-flex justify-content-between flex-wrap">
            <div>
                <h4>Readscape</h4>
                <p class="small">Your go-to digital library at SMK IDN Boarding School Akhwat</p>
            </div>
            <div>
                <h>Contact Us</h>
                <p class="small">Jl. Raya Cileungsi - Jonggol KM. 5, Cileungsi, Bogor</p>
                <p class="small">Email: info@idn.sch.id</p>
            </div>
        </div>
        <div class="text-center mt-3 small">&copy; 2025 IDN Akhwat. All rights reserved.</div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>

