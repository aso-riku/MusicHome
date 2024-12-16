let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dots span');

        function updateSlides(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
                dots[i].classList.toggle('active', i === index);
            });
        }

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlides(currentIndex);
        }

        function showPrevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlides(currentIndex);
        }

        document.getElementById('next').addEventListener('click', showNextSlide);
        document.getElementById('prev').addEventListener('click', showPrevSlide);

        dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                currentIndex = parseInt(e.target.dataset.index);
                updateSlides(currentIndex);
            });
        });

        setInterval(showNextSlide, 3000);