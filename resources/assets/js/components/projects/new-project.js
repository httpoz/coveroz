import React, {Component} from 'react';
import {connect} from 'react-redux';
import {addProject, showProjectForm} from "../../actions/projectActions";
import {Dialog} from "element-react"
import "element-theme-default"

class NewProject extends Component {
    constructor() {
        super()

        this.state = {
            title: ''
        }

        this.saveProject = this.saveProject.bind(this)
        this.onChange = this.onChange.bind(this)
        this.closeForm = this.closeForm.bind(this)
    }

    closeForm() {
        this.props.showProjectForm();
    }

    onChange(e) {
        this.setState({[e.target.name]: e.target.value})
    }

    saveProject(event) {
        event.preventDefault();
        this.props.addProject({title: this.state.title});
    }

    render() {
        return (
            <Dialog title={(this.props.project) ? 'Edit' : 'Add Project'} visible={this.props.show_form}
                    onCancel={this.closeForm}>
                <Dialog.Body>
                    <form onSubmit={this.saveProject}>
                        <div className="form-group">
                            <input name="title" value={this.state.title} onChange={this.onChange} autoFocus
                                   className="form-control"/>
                        </div>
                        <div className="text-right">
                            <button className="btn btn-primary">Save</button>
                        </div>
                    </form>
                </Dialog.Body>
            </Dialog>
        )
    }
}

const mapStateToProps = state => ({
    show_form: state.projects.show_form
})
export default connect(mapStateToProps, {addProject, showProjectForm})(NewProject)