document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.tm-tab-link');
  
    function setActiveTab() {
      const currentUrl = window.location.href;
      links.forEach(link => {
        const linkHref = link.getAttribute('href');
        if (currentUrl === linkHref) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    }
  
    // Call on page load
    setActiveTab();
  
    // Optionally, you could also add event listeners to handle clicks if needed
    links.forEach(link => {
      link.addEventListener('click', setActiveTab);
    });
  });
  