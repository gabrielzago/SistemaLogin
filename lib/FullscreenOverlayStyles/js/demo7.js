
	var container = document.querySelector( 'div.container' ),
		//triggerBttn = document.getElementById( 'trigger-overlay' ),
               // btnSlider2 = document.getElementById('btnSlider2'),
               // btnSlider3 = document.getElementById('btnSlider3'),
               // btnSlider4 = document.getElementById('btnSlider4'),
               // btnSlider5 = document.getElementById('btnSlider5'),
               // btnNoticia1 = document.getElementById('btnNoticia1'),
               // btnNoticia2 = document.getElementById('btnNoticia2'),
               // btnNoticia3 = document.getElementById('btnNoticia3'),
               // btnNoticia4 = document.getElementById('btnNoticia4'),
               // btnNoticia5 = document.getElementById('btnNoticia5'),
               // btnNoticia6 = document.getElementById('btnNoticia6'),
               // btnNoticia7 = document.getElementById('btnNoticia7'),
               // btnNoticia8 = document.getElementById('btnNoticia8'),
               // btnBlock1 = document.getElementById('btnBlock1'), 
//                btnAbrir = document.getElementById( 'btnAbrirSearchNot' ),
		overlay = document.querySelector( 'div.overlay' ),
		closeBttn = overlay.querySelector( 'button.overlay-close' );
                var closeBttn2 = overlay.querySelector( 'button.btnAcao' );
                
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };
        
        
	function toggleOverlay() {
           
		if( classie.has( overlay, 'open' ) ) {
			classie.remove( overlay, 'open' );
			classie.remove( container, 'overlay-open' );
			classie.add( overlay, 'close' );
			var onEndTransitionFn = function( ev ) {
				if( support.transitions ) {
					if( ev.propertyName !== 'visibility' ) return;
					this.removeEventListener( transEndEventName, onEndTransitionFn );
				}
				classie.remove( overlay, 'close' );
			};
			if( support.transitions ) {
				overlay.addEventListener( transEndEventName, onEndTransitionFn );
			}
			else {
				onEndTransitionFn();
			}
		}
		else if( !classie.has( overlay, 'close' ) ) {
			classie.add( overlay, 'open' );
			classie.add( container, 'overlay-open' );
		}
	}

	//triggerBttn.addEventListener( 'click', toggleOverlay );
        //btnSlider2.addEventListener('click', toggleOverlay);
        //btnSlider3.addEventListener('click', toggleOverlay);
        //btnSlider4.addEventListener('click', toggleOverlay);
        //btnSlider5.addEventListener('click', toggleOverlay);
        //btnNoticia1.addEventListener('click', toggleOverlay);
        //btnNoticia2.addEventListener('click', toggleOverlay);
        //btnNoticia3.addEventListener('click', toggleOverlay);
       // btnNoticia4.addEventListener('click', toggleOverlay);
       // btnNoticia5.addEventListener('click', toggleOverlay);
       // btnNoticia6.addEventListener('click', toggleOverlay);
       // btnNoticia7.addEventListener('click', toggleOverlay);
       // btnNoticia8.addEventListener('click', toggleOverlay);
        //btnBlock1.addEventListener('click', toggleOverlay, false);
//        btnAbrir.addEventListener( 'click', toggleOverlay );
        //btnAbrir.addEventListener('click', toggleOverlay);
	closeBttn.addEventListener( 'click', toggleOverlay );
        closeBttn2.addEventListener( 'click', toggleOverlay );
