function EstilosdelNavbar() {
    const url = window.location.href; 
    if (url.includes('index.php')) {
        document.getElementById('nav-inicio').classList.add('active');
    } else if (url.includes('galeria.php')) {  // Cambié 'location' a 'url'
        document.getElementById('nav-galeria').classList.add('active');
    } else if (url.includes('presupuesto.php')) {  // Cambié 'location' a 'url'
        document.getElementById('nav-presupuesto').classList.add('active');
    } else if (url.includes('contacto.php')) {  // Cambié 'location' a 'url'
        document.getElementById('nav-contacto').classList.add('active');
    }
}

EstilosdelNavbar();