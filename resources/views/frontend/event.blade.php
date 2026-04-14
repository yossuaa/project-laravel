@include('layout.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Events Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .drag-scroll { cursor: grab; }
    .drag-scroll.dragging { cursor: grabbing; }
    .workshop-scroll img { user-select: none; -webkit-user-drag: none; }
    .section-scroll-animate {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .section-scroll-animate.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .grid-item-animate {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .grid-item-animate.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .grid-item-animate.delay-100 { transition-delay: 100ms; }
    .grid-item-animate.delay-200 { transition-delay: 200ms; }
    .grid-item-animate.delay-300 { transition-delay: 300ms; }
    .grid-item-animate.delay-400 { transition-delay: 400ms; }
  </style>
</head>
<body class="bg-[#511314] text-white text-sm">

  <br><br>

  <!-- ================= TOP EVENT SECTION (compact) ================= -->
  <section class="py-10 px-4 md:px-12 text-white bg-cover bg-center bg-no-repeat"
           style="background-image: url('/event/bg.png');">

    <div class="max-w-screen-xl mx-auto">
      <h1 class="text-white text-2xl md:text-3xl font-extrabold mb-6 text-center md:text-left">Top Event</h1>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 items-stretch md:max-h-[72vh]">
        @if ($topEvent->isNotEmpty())
          @php $main = $topEvent->first(); @endphp

          <div class="md:col-span-2 flex grid-item-animate">
            <div class="w-full  rounded-lg overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
              <div class="flex-none">
                <img src="{{ asset('event/'.$main->image) }}"
                     alt="{{ $main->subheadline }}"
                     class="w-full h-40 md:h-44 lg:h-48 object-cover">
              </div>

              <div class="p-3 md:p-4 flex-1 overflow-auto">
                <p class="text-xs md:text-sm text-white-500 mb-1">{{ $main->date }}</p>
                <h3 class="text-lg md:text-xl font-semibold mt-1 leading-tight text-white-900">
                  {{ $main->subheadline }}
                </h3>
                <p class="mt-2 text-white-600 text-sm md:text-base leading-relaxed text-justify">
                  {{ \Illuminate\Support\Str::limit(strip_tags($main->description), 350) }}
                </p>
              </div>
            </div>
          </div>
        @endif

        <div class="md:col-span-1 flex flex-col gap-3">
          @foreach ($topEvent->skip(1)->take(3) as $index => $item)
            <a href="#" class="block flex-1 grid-item-animate delay-{{ ($index + 1) * 100 }}">
              <div class="h-full rounded-lg overflow-hidden shadow-sm hover:shadow-md transition flex">
                <div class="flex-none p-2 md:p-3">
                  <img src="{{ asset('event/'.$item->image) }}"
                       alt="{{ $item->subheadline }}"
                       class="w-20 h-14 md:w-24 md:h-16 object-cover rounded-sm">
                </div>

                <div class="flex-1 p-2 md:p-3 flex flex-col">
                  <p class="text-[11px] text-white-500 mb-1">{{ $item->date }}</p>
                  <h4 class="text-sm md:text-sm font-semibold leading-snug text-white-900">
                    {{ $item->subheadline }}
                  </h4>
                  <p class="text-xs text-white-600 mt-1 leading-tight flex-1 overflow-hidden text-justify">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 120) }}
                  </p>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- ================= TOP WORKSHOP SECTION (horizontal carousel, up to 5 items) ================= -->
  <section class="py-10 px-4 md:px-12 bg-[#511314] text-white section-scroll-animate" style="background-image: url('/event/elemen2.png');">
    <div class="max-w-screen-xl mx-auto">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h2 class="text-2xl md:text-3xl font-extrabold">Top Workshop</h2>
          <p class="text-sm text-gray-200 mt-1">Ruang Berkarya: Workshop Literasi & Seni</p>
        </div>
      </div>

      <div class="relative">
        <div
          class="workshop-scroll drag-scroll flex gap-6 overflow-x-auto no-scrollbar py-4 px-2"
          tabindex="0"
          role="region"
          aria-label="Top Workshop carousel"
          style="scroll-behavior: smooth; touch-action: pan-y;">
          @foreach ($topWorkshop->take(5) as $index => $workshop)
            <div class="flex-none w-52 md:w-56 lg:w-64 grid-item-animate delay-{{ $index * 100 }}">
              <div class="bg-transparent">
                <div class="rounded-xl overflow-hidden border-2 border-transparent hover:border-yellow-300 transition">
                  <img src="{{ $workshop->image ? asset('event/'.$workshop->image) : 'https://via.placeholder.com/400x400' }}"
                       class="w-full h-44 md:h-52 object-cover rounded-lg shadow-md"
                       alt="{{ $workshop->subheadline }}">
                </div>

                <div class="mt-3">
                  <h3 class="text-sm md:text-base font-semibold text-white leading-tight">
                    {{ $workshop->subheadline ?? 'Judul Workshop' }}
                  </h3>
                  <p class="text-xs text-gray-300 mt-1">
                    {{ $workshop->date ?? 'Tanggal tidak tersedia' }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- ================= SHARING SESSION SECTION (FULL TAILWIND) ================= -->
  <section class="py-8 px-4 md:px-12 bg-[#511314] section-scroll-animate" style="background-image: url('/event/elemen.png');">
    <div class="max-w-screen-xl mx-auto">
      <h1 class="text-White text-2xl md:text-3xl font-extrabold mb-2 text-center md:text-left">Let Sharing Session!</h1>
      {{-- Ensure exactly 4 items (take 4) --}}
      @php
        $items = $sharingSession->take(4);
        $left = $items->get(0);
        $topRight = $items->get(1);
        $bottomLeft = $items->get(2);
        $bottomRight = $items->get(3);
      @endphp

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
        <!-- LEFT big card -->
        <div class="md:col-span-2 grid-item-animate">
          @if ($left)
            <div
              class="sharing-card relative rounded-lg overflow-hidden border-2 border-white/30 focus:outline-none focus:ring-4 focus:ring-white/10"
              role="button"
              tabindex="0"
              aria-pressed="false"
              data-id="{{ $left->id ?? '' }}">
              <img src="{{ asset('event/'.$left->image) }}"
                   alt="{{ $left->subheadline ?? 'Sharing Session' }}"
                   class="w-full h-70 md:h-[358px] object-cover filter brightness-50 transition duration-200 ease-in-out transform">
              <!-- overlay managed via Tailwind classes (opacity) -->
              <div class="absolute inset-0 bg-black/30 transition-opacity duration-200"></div>

              <!-- caption -->
              <div class="absolute left-4 bottom-4 right-4">
                <div class="bg-black/40 px-3 py-2 rounded-md">
                  <p class="text-xs text-gray-200">{{ $left->date ?? '' }}</p>
                  <h3 class="text-white text-lg md:text-xl font-semibold">{{ $left->subheadline ?? 'Judul Sharing' }}</h3>
                </div>
              </div>
            </div>
          @endif
        </div>

        <!-- RIGHT column -->
        <div class="md:col-span-2">
          <div class="grid grid-cols-2 gap-4">
            <!-- top wide -->
            <div class="col-span-2 grid-item-animate delay-100">
              @if ($topRight)
                <div
                  class="sharing-card relative rounded-lg overflow-hidden border-2 border-white/30 focus:outline-none focus:ring-4 focus:ring-white/10"
                  role="button"
                  tabindex="0"
                  aria-pressed="false"
                  data-id="{{ $topRight->id ?? '' }}">
                  <img src="{{ asset('event/'.$topRight->image) }}"
                       alt="{{ $topRight->subheadline ?? 'Sharing Session' }}"
                       class="w-full h-40 md:h-48 object-cover filter brightness-50 transition duration-200 ease-in-out transform">
                  <div class="absolute inset-0 bg-black/40 transition-opacity duration-200"></div>

                  <div class="absolute left-3 bottom-3 right-3">
                    <div class="bg-black/40 px-2 py-1 rounded-md">
                      <p class="text-xs text-gray-200">{{ $topRight->date ?? '' }}</p>
                      <h4 class="text-white text-sm font-semibold">{{ $topRight->subheadline ?? 'Judul' }}</h4>
                    </div>
                  </div>
                </div>
              @endif
            </div>

            <!-- bottom left -->
            <div class="grid-item-animate delay-200">
              @if ($bottomLeft)
                <div
                  class="sharing-card relative rounded-lg overflow-hidden border-2 border-white/30 focus:outline-none focus:ring-4 focus:ring-white/10"
                  role="button"
                  tabindex="0"
                  aria-pressed="false"
                  data-id="{{ $bottomLeft->id ?? '' }}">
                  <img src="{{ asset('event/'.$bottomLeft->image) }}"
                       alt="{{ $bottomLeft->subheadline ?? 'Sharing Session' }}"
                       class="w-full h-36 object-cover filter brightness-50 transition duration-200 ease-in-out transform">
                  <div class="absolute inset-0 bg-black/40 transition-opacity duration-200"></div>

                  <div class="absolute left-3 bottom-3 right-3">
                    <div class="bg-black/40 px-2 py-1 rounded-md">
                      <p class="text-xs text-gray-200">{{ $bottomLeft->date ?? '' }}</p>
                      <h4 class="text-white text-sm font-semibold">{{ $bottomLeft->subheadline ?? 'Judul' }}</h4>
                    </div>
                  </div>
                </div>
              @endif
            </div>

            <!-- bottom right -->
            <div class="grid-item-animate delay-300">
              @if ($bottomRight)
                <div
                  class="sharing-card relative rounded-lg overflow-hidden border-2 border-white/30 focus:outline-none focus:ring-4 focus:ring-white/10"
                  role="button"
                  tabindex="0"
                  aria-pressed="false"
                  data-id="{{ $bottomRight->id ?? '' }}">
                  <img src="{{ asset('event/'.$bottomRight->image) }}"
                       alt="{{ $bottomRight->subheadline ?? 'Sharing Session' }}"
                       class="w-full h-36 object-cover filter brightness-50 transition duration-200 ease-in-out transform">
                  <div class="absolute inset-0 bg-black/40 transition-opacity duration-200"></div>

                  <div class="absolute left-3 bottom-3 right-3">
                    <div class="bg-black/40 px-2 py-1 rounded-md">
                      <p class="text-xs text-gray-200">{{ $bottomRight->date ?? '' }}</p>
                      <h4 class="text-white text-sm font-semibold">{{ $bottomRight->subheadline ?? 'Judul' }}</h4>
                    </div>
                  </div>
                </div>
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    // scroll helper for the workshop carousel (uses .workshop-scroll)
    function scrollWorkshops(dir = 1) {
      const container = document.querySelector('.workshop-scroll');
      if (!container) return;
      const scrollAmount = container.clientWidth * 0.6 * dir;
      container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }

    // Drag-to-scroll + wheel-to-scroll for the workshop carousel
    (function () {
      const container = document.querySelector('.workshop-scroll');
      if (!container) return;

      // --- Wheel: convert vertical wheel to horizontal scroll (useful for mouse wheel) ---
      container.addEventListener('wheel', (e) => {
        // only intercept when there's horizontal overflow
        if (container.scrollWidth > container.clientWidth) {
          e.preventDefault();
          // multiply to make scroll feel natural
          container.scrollLeft += e.deltaY * 1.5;
        }
      }, { passive: false });

      // --- Pointer drag to scroll (mouse / pen) ---
      let isDown = false;
      let startX;
      let scrollLeft;

      container.addEventListener('pointerdown', (e) => {
        // only left button starts drag
        if (e.button && e.button !== 0) return;
        isDown = true;
        container.classList.add('dragging');
        startX = e.clientX;
        scrollLeft = container.scrollLeft;
        // capture the pointer so we continue to get events outside the element
        container.setPointerCapture(e.pointerId);
      });

      container.addEventListener('pointermove', (e) => {
        if (!isDown) return;
        const x = e.clientX;
        const walk = (startX - x); // positive = move right
        container.scrollLeft = scrollLeft + walk;
      });

      const stopDrag = (e) => {
        if (!isDown) return;
        isDown = false;
        container.classList.remove('dragging');
        try {
          container.releasePointerCapture && container.releasePointerCapture(e.pointerId);
        } catch (err) { /* ignore */ }
      };

      container.addEventListener('pointerup', stopDrag);
      container.addEventListener('pointerleave', stopDrag);
      container.addEventListener('pointercancel', stopDrag);

      // prevent images from being dragged by browser's default drag behavior
      const imgs = container.querySelectorAll('img');
      imgs.forEach(img => {
        img.addEventListener('dragstart', (e) => e.preventDefault());
      });

      // Improve touch experience: make sure vertical swipes still scroll page (touch-action set to pan-y in markup)
      // No further code needed for basic touch support.
    })();

    // Full Tailwind approach: JS only toggles Tailwind classes (no custom CSS)
    (function () {
      const cards = Array.from(document.querySelectorAll('.sharing-card'));
      if (!cards.length) return;

      function setActive(targetCard) {
        // If target already active, deactivate it (toggle off)
        const alreadyActive = targetCard.classList.contains('active');
        cards.forEach(c => {
          c.classList.remove('active');
          c.setAttribute('aria-pressed', 'false');
          // reset image classes (brightness -> 50%, remove scale)
          const img = c.querySelector('img');
          if (img) {
            img.classList.remove('brightness-100', 'scale-105');
            img.classList.add('brightness-50');
          }
          const overlay = c.querySelector('.absolute.inset-0');
          if (overlay) {
            overlay.classList.remove('opacity-0');
            overlay.classList.add('opacity-100');
          }
        });

        if (!alreadyActive) {
          targetCard.classList.add('active');
          targetCard.setAttribute('aria-pressed', 'true');
          const img = targetCard.querySelector('img');
          if (img) {
            img.classList.remove('brightness-50');
            img.classList.add('brightness-100', 'scale-105');
          }
          const overlay = targetCard.querySelector('.absolute.inset-0');
          if (overlay) {
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
          }
        }
      }

      // Initialize overlay opacity classes to be controllable via Tailwind utilities
      cards.forEach(c => {
        const overlay = c.querySelector('.absolute.inset-0');
        if (overlay) {
          overlay.classList.remove('opacity-0');
          overlay.classList.add('opacity-100');
        }
      });

      // Click and keyboard handlers
      cards.forEach(card => {
        card.addEventListener('click', (e) => {
          setActive(card);
        });

        card.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            setActive(card);
          }
        });
      });

    })();
  </script>

  <script>
    // NEW: Hover/focus/touch interactions to dim/brighten images using only Tailwind utility classes.
    // NOTE: This script is added without changing any of your existing markup or classes.
    (function () {
      const cards = Array.from(document.querySelectorAll('.sharing-card'));
      if (!cards.length) return;

      cards.forEach(card => {
        const img = card.querySelector('img');
        const overlay = card.querySelector('.absolute.inset-0');

        // helper: apply bright state (as in UI #2)
        function applyBright() {
          if (!img && !overlay) return;
          // don't override a clicked/active card
          if (card.classList.contains('active')) return;
          if (img) {
            img.classList.remove('brightness-50');
            img.classList.add('brightness-100', 'scale-105');
          }
          if (overlay) {
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
          }
        }

        // helper: revert to dim state (default)
        function applyDim() {
          if (!img && !overlay) return;
          // don't override a clicked/active card
          if (card.classList.contains('active')) return;
          if (img) {
            img.classList.remove('brightness-100', 'scale-105');
            img.classList.add('brightness-50');
          }
          if (overlay) {
            overlay.classList.remove('opacity-0');
            overlay.classList.add('opacity-100');
          }
        }

        // Mouse interactions
        card.addEventListener('mouseenter', () => applyBright());
        card.addEventListener('mouseleave', () => applyDim());

        // Keyboard accessibility: focus/blur
        card.addEventListener('focus', () => applyBright(), true);
        card.addEventListener('blur', () => applyDim(), true);

        // Touch support: touchstart brighten, touchend revert shortly after (if not active)
        card.addEventListener('touchstart', () => {
          applyBright();
        }, { passive: true });

        card.addEventListener('touchend', () => {
          // small delay so user sees the brightened image on tap
          setTimeout(() => {
            applyDim();
          }, 200);
        }, { passive: true });

        // If a card becomes active (clicked), ensure state remains consistent:
        // monitor attribute changes (aria-pressed) to keep bright state for active card
        const observer = new MutationObserver(mutations => {
          mutations.forEach(m => {
            if (m.attributeName === 'class' || m.attributeName === 'aria-pressed') {
              if (card.classList.contains('active')) {
                // enforce bright state
                if (img) {
                  img.classList.remove('brightness-50');
                  img.classList.add('brightness-100', 'scale-105');
                }
                if (overlay) {
                  overlay.classList.remove('opacity-100');
                  overlay.classList.add('opacity-0');
                }
              } else {
                // ensure dim state
                if (img) {
                  img.classList.remove('brightness-100', 'scale-105');
                  img.classList.add('brightness-50');
                }
                if (overlay) {
                  overlay.classList.remove('opacity-0');
                  overlay.classList.add('opacity-100');
                }
              }
            }
          });
        });

        observer.observe(card, { attributes: true, attributeFilter: ['class', 'aria-pressed'] });

      });
    })();
  </script>

  <script>
    // Scroll Animation Script
    (function() {
      // Elements to animate
      const animatedSections = document.querySelectorAll('.section-scroll-animate');
      const animatedItems = document.querySelectorAll('.grid-item-animate');
      
      // Configuration
      const config = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
      };
      
      // Callback function for Intersection Observer
      function handleIntersection(entries, observer) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // Add visible class with a small delay for staggered effect
            setTimeout(() => {
              entry.target.classList.add('visible');
            }, entry.target.classList.contains('grid-item-animate') ? 0 : 50);
            
            // Stop observing after animation triggers
            observer.unobserve(entry.target);
          }
        });
      }
      
      // Create observers
      const sectionObserver = new IntersectionObserver(handleIntersection, config);
      const itemObserver = new IntersectionObserver(handleIntersection, config);
      
      // Observe sections
      animatedSections.forEach(section => {
        sectionObserver.observe(section);
      });
      
      // Observe grid items
      animatedItems.forEach(item => {
        itemObserver.observe(item);
      });
      
      // Handle scroll direction for additional effects
      let lastScrollTop = 0;
      const scrollThreshold = 100; // Minimum scroll distance to trigger direction-based effects
      
      window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollDirection = scrollTop > lastScrollTop ? 'down' : 'up';
        const scrollDistance = Math.abs(scrollTop - lastScrollTop);
        
        // Only apply direction-based effects if scrolled enough
        if (scrollDistance > scrollThreshold) {
          document.body.setAttribute('data-scroll-direction', scrollDirection);
          
          // Optional: Add/remove classes based on scroll direction
          if (scrollDirection === 'up') {
            document.documentElement.classList.add('scrolling-up');
            document.documentElement.classList.remove('scrolling-down');
          } else {
            document.documentElement.classList.add('scrolling-down');
            document.documentElement.classList.remove('scrolling-up');
          }
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
      });
      
      // Initialize animation on page load for elements already in viewport
      function checkInitialVisibility() {
        animatedSections.forEach(section => {
          const rect = section.getBoundingClientRect();
          const isVisible = (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
          );
          
          if (isVisible) {
            setTimeout(() => {
              section.classList.add('visible');
            }, 100);
          }
        });
        
        animatedItems.forEach(item => {
          const rect = item.getBoundingClientRect();
          const isVisible = (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
          );
          
          if (isVisible) {
            setTimeout(() => {
              item.classList.add('visible');
            }, 150);
          }
        });
      }
      
      // Run on DOM load and after a short delay
      document.addEventListener('DOMContentLoaded', checkInitialVisibility);
      setTimeout(checkInitialVisibility, 500);
      
    })();
  </script>
  
  <style>
    /* Additional scroll direction effects */
    [data-scroll-direction="up"] .section-scroll-animate.visible {
      animation: floatUp 0.8s ease-out;
    }
    
    [data-scroll-direction="down"] .section-scroll-animate.visible {
      animation: floatDown 0.8s ease-out;
    }
    
    @keyframes floatUp {
      0% {
        opacity: 0;
        transform: translateY(40px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    @keyframes floatDown {
      0% {
        opacity: 0;
        transform: translateY(-40px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    /* Smooth scroll behavior for the whole page */
    html {
      scroll-behavior: smooth;
    }
  </style>
</body>
</html>