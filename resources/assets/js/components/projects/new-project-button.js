import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class NewProjectButton extends Component {
    render() {
        return (
            <button className="btn btn-outline-light btn-sm">New Project</button>
        );
    }
}

if (document.getElementById('new-project-button')) {
    ReactDOM.render(<NewProjectButton />, document.getElementById('new-project-button'));
}
