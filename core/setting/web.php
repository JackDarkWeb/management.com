<?php

Router::connect('announce/:slug-:id', "announce/read/id:([0-9]+)/slug:([a-zA-Z0-9\-]+)");

// You can more add the Router here