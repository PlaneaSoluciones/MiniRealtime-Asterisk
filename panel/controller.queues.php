<?php

//ringall: ring all available channels until one answers (default)
//roundrobin: take turns ringing each available interface (deprecated in 1.4, use rrmemory)
//leastrecent: ring interface which was least recently called by this queue
//fewestcalls: ring the one with fewest completed calls from this queue
//random: ring random interface
//rrmemory: round robin with memory, remember where we left off last ring pass
