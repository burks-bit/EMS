require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
import 'jquery/dist/jquery.min.js';


$('#dob').datepicker();