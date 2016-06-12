/**
 * Theme Name: Card Flip
 * Version: 1.0.0
 * Theme URL: -
 *
 * A full-screen, two column layout for showing a featured image and description
 *
 * This theme is powered by Sequence.js - The
 * responsive CSS animation framework for creating unique sliders,
 * presentations, banners, and other step-based applications.
 *
 * Author: Ahmad Ali Abdilah
 * Author URL: -
 *
 * Theme License: -
 * Sequence.js Licenses: -
 *
 * Copyright © 2016 Ahmad Ali Abdilah Design Limited unless otherwise stated.
 */

// Get the Sequence element
var sequenceElement = document.getElementById("sequence");

// Place your Sequence options here to override defaults
// See: http://sequencejs.com/documentation/#options
var options = {
  keyNavigation: true,
  animateCanvas: true,
  phaseThreshold: false,
  preloader: true,
  fadeStepWhenSkipped: false,
  reverseWhenNavigatingBackwards: true,
  swipeEvents: {
    left: function(sequence) {
      sequence.next();
    },
    right: function(sequence) {
      sequence.prev();
    },
    up: function(sequence) {
      sequence.next();
    },
    down: function(sequence) {
      sequence.prev();
    }
  },
  fallback: {
    speed: 300
  }
}

var mouseWheel = {

  // Only allow mousewheel navigation every x amount of ms
  quietPeriod: 1000,

  // Set this to the same length as the longest transition in Sequence
  animationTime: 300
}

// Launch Sequence on the element, and with the options we specified above
var mySequence = sequence(sequenceElement, options);
