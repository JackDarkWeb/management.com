<?php

Router::connect('announce/:slug-:id', "announce/read/id:([0-9]+)/slug:([a-zA-Z0-9àçéèêëíìîïñóòôöõúùûüýÿæ\-]+)");

// You can more add the Router here