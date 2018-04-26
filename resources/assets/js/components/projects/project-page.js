import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux'
import store from '../../store'
import ProjectList from './project-list'
import NewProject from './new-project'
import NewProjectButton from './new-project-button'

export default class ProjectPage extends Component {
    render() {
        return (
            <Provider store={store}>
                <div>
                    <section className="ribbon py-3 text-white bg-primary mb-5 shadow-sm">
                        <div className="container">
                            <div className="row">
                                <div className="col-sm-8">
                                    <h5 className="mb-0">Project List</h5>
                                </div>
                                <div className="col-sm-4 text-right">
                                    <NewProjectButton/>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div className="container">
                        <div className="row">
                            <div className="col-12">
                                <NewProject/>
                                <ProjectList/>
                            </div>
                        </div>
                    </div>
                </div>
            </Provider>
        );
    }
}

if (document.getElementById('project-page')) {
    ReactDOM.render(<ProjectPage/>, document.getElementById('project-page'));
}
