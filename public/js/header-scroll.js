$(document).ready(function() {
    const header = document.querySelector('body:not(.mpi-rules) #scrollheader');
    if(header != null) {
        var headerHeight = header.offsetHeight;
        var headerPositioning = getComputedStyle(header).getPropertyValue('position');

        document.addEventListener('scroll', function() {
            if(headerHeight) {
                const headerBlock = document.querySelector('#header-block');
                const headerLogo = document.querySelector('body:not(.mpi-rules) #scrollheader .logo img');

                var headerFade = false;
                var headerSlide = true;

                var headerToggleLogo = false;

                var shootScroll = false;

                if (window.innerWidth > 769) {

                    if (document.body.scrollTop > headerHeight || document.documentElement.scrollTop > headerHeight) {

                        header.classList.add('headerFixed');
                        headerBlock.style.display = 'block';
                        
                        if(headerPositioning == 'absolute') {
                            headerBlock.style.height = 0 + "px";
                        } else {
                            headerBlock.style.height = headerHeight + "px";
                        }  

                        if (!shootScroll) {
                            if (headerFade) {
                                header.classList.add('headerFade');
                            } else if (headerSlide) {
                                header.classList.add('headerSlide');
                            }
                            shootScroll = true;
                        }

                        if (headerToggleLogo) {
                            headerLogo.setAttribute('src', '<?=$url?>imagens/selo.png');
                        }

                    } else {
                        shootScroll = false;
                        header.style.display = 'block';
                        header.classList.remove('headerFixed', 'headerFade', 'headerSlide');
                        if(header.classList.length == 0) {
                            header.removeAttribute("class");
                        }
                        headerBlock.style.display = 'none';

                        if (headerToggleLogo) {
                            headerLogo.setAttribute('src', '<?=$url?>imagens/logo.png');
                        }
                    }
                }
            } 
        });
    }   
});