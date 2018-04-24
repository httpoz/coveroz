import {LIST_PROJECTS, ADD_PROJECT, SHOW_PROJECT_FORM} from '../actions/types'

const initialState = {
    list: [],
    project: {},
    show_form: false
};

export default function (state = initialState, action) {
    switch (action.type) {
        case LIST_PROJECTS:
            return {
                ...state,
                list: action.payload
            };
        case SHOW_PROJECT_FORM:
            return {
                ...state,
                project: action.payload,
                show_form: !state.show_form
            };
        case ADD_PROJECT:
            return {
                ...state,
                project: action.payload
            };
        default:
            return state;
    }
}