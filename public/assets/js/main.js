document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.tm-page-link');
    const sections = document.querySelectorAll('.tm-page-content');
    
    function setActiveNav() {
      const scrollPosition = window.scrollY;
  
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        
        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
          const id = section.getAttribute('id');
          links.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('data-id') === id) {
              link.classList.add('active');
            }
          });
        }
      });
    }
  
    window.addEventListener('scroll', setActiveNav);
    setActiveNav(); // Call initially in case the page is loaded at a scrolled position
  });
  