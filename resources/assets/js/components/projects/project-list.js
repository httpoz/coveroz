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
            <div className="card shadow-sm">
                <table className="table mb-0">
                    <thead>
                    <tr>
                        <th>Health</th>
                        <th>Name</th>
                        <th>Reported</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {this.props.projects.map(project =>
                    <tr key={project.id}>
                        <td><img src={project.health} width="36" alt="Project health"/></td>
                        <td>{project.title}</td>
                        <td>{project.last_reported || 'Never'}</td>
                        <td className="text-right"><a href={`/projects/${project.id}`} className="btn btn-link">Open</a></td>
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