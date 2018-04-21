import {LIST_PROJECTS, ADD_PROJECT} from '../actions/types'

const initialState = {
    list: [],
    item: {},
    show_form: false
};

export default function (state = initialState, action) {
    switch (action.type) {
        case LIST_PROJECTS:
            return {
                ...state,
                list: action.payload
            };
        default:
            return state;
    }
}