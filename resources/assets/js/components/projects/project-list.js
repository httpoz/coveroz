import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {connect} from 'react-redux'
import {listProjects} from '../../actions/projectActions'

class ProjectList extends Component {
    componentWillMount() {
        this.props.listProjects();
    }

    render() {
        return (
            <div className="card">
                <table className="table mb-0">
                    <thead>
                    <tr>
                        <th>Health</th>
                        <th>Name</th>
                        <th>Reported</th>
                    </tr>
                    </thead>
                    <tbody>
                    {this.props.projects.map(project =>
                    <tr>
                        <td><img src={project.health} width="36" alt="Project health"/></td>
                        <td>{project.title}</td>
                        <td>{project.last_reported}</td>
                    </tr>
                    )}
                    </tbody>
                </table>
            </div>
        )
    }
}

ProjectList.propTypes = {
    listProjects: PropTypes.func.isRequired,
    projects: PropTypes.array.isRequired
}

const mapStateToProps = state => ({
    projects: state.projects.list
})

export default connect(mapStateToProps, {listProjects})(ProjectList)