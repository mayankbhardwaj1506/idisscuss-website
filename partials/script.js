
    let themeMode = document.getElementById('themes-link');
    let currentTheme = document.getElementById('navbar');

    function darkTheme() {
        localStorage.setItem('theme','dark')
        themeMode.href = 'partials/darkstyle.css';

        currentTheme.classList.replace('navbar-light','navbar-dark');
        window.location.reload();
        console.log("Dark Theme");
        
        
        }

    function defaultTheme() {
        localStorage.setItem('theme','default')
        themeMode.href = 'partials/style.css';

        currentTheme.classList.replace('navbar-light','navbar-dark');
    console.log("Default Theme");
    window.location.reload();

        
        }

    function lightTheme() {
        localStorage.setItem('theme','light')
        themeMode.href = 'partials/lightstyle.css';

        currentTheme.classList.replace('navbar-dark','navbar-light');
    console.log("Light Theme");
    
    window.location.reload();
       
        }

    if(localStorage.getItem('theme')=='dark'){

        themeMode.href = 'partials/darkstyle.css';

        currentTheme.classList.replace('navbar-light','navbar-dark');
    console.log("Dark Theme");
   
    

    } else if (localStorage.getItem('theme')=='light') {
        themeMode.href = 'partials/lightstyle.css';

        currentTheme.classList.replace('navbar-dark','navbar-light');
    console.log("Light Theme");
    

    } else if (localStorage.getItem('theme')=='default') {
        themeMode.href = 'partials/style.css';

        currentTheme.classList.replace('navbar-light','navbar-dark');
    console.log("Default Theme");
        
    } else {
        themeMode.href = 'partials/style.css';

        currentTheme.classList.replace('navbar-light','navbar-dark');
    }