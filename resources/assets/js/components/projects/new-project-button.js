import React, { Component } from 'react';
import {connect} from 'react-redux';
import {showProjectForm} from "../../actions/projectActions";

class NewProjectButton extends Component {
    constructor() {
        super()

        this.showForm = this.showForm.bind(this)
    }

    showForm () {
        this.props.showProjectForm();
    }

    render() {
        return (
            <button className="btn btn-outline-light btn-sm" onClick={this.showForm}>New Project</button>
        );
    }
}

export default connect(null, {showProjectForm})(NewProjectButton)
