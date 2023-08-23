// resources/js/app.js
import React from 'react';
import ReactDOM from 'react-dom';
import Content from './components/Contents'; // Adjust the path accordingly

if (document.getElementById('content')) {
    ReactDOM.render(<Content />, document.getElementById('content'));
}
