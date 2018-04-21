import {LIST_PROJECTS, ADD_PROJECT} from "./types";

export const listProjects = () => dispatch => {
    axios.get('/projects').then(success => {
        dispatch({
            type: LIST_PROJECTS,
            payload: success.data
        })
    })
}