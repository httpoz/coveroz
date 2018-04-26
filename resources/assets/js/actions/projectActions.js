import {LIST_PROJECTS, ADD_PROJECT, SHOW_PROJECT_FORM} from "./types";

export const listProjects = () => dispatch => {
    axios.get('/projects').then(success => {
        dispatch({
            type: LIST_PROJECTS,
            payload: success.data
        })
    })
}

export const addProject = (project) => dispatch => {
    axios.post('/projects', project).then(success => {
        dispatch({
            type: ADD_PROJECT,
            payload: success.data
        })
        dispatch(showProjectForm());
        dispatch(listProjects());
    })
}

export const showProjectForm = (project = {}) => dispatch => {
    dispatch({
        type: SHOW_PROJECT_FORM,
        payload: project
    })
}