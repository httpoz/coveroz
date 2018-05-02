import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {connect} from 'react-redux'
import {listProjects} from '../../actions/projectActions'

class ProjectList extends Component {

    componentWillMount() {
        this.props.listProjects();
    }

    openProject (project) {
        window.location=`/projects/${project}`
    }

    render() {
        return (
            <div className="card shadow-sm">
                <table className="table table-hover mb-0">
                    <thead>
                    <tr className="text-uppercase">
                        <th>Health</th>
                        <th>Coverage</th>
                        <th>Run</th>
                        <th>Name</th>
                        <th>Commit</th>
                        <th>Reported</th>
                    </tr>
                    </thead>
                    <tbody>
                    {this.props.projects.map(project =>
                    <tr key={project.id} onClick={() => {this.openProject(project.id)}} className={(project.health < 40) ? 'bg-danger text-white' : ''}>
                        <td><img src={project.health_img} width="36" alt="Project health"/></td>
                        <td>{project.health}%</td>
                        <td>{project.metrics_count}</td>
                        <td>{project.title}</td>
                        <th>{project.last_commit}</th>
                        <td>{project.last_reported || 'Never'}</td>
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