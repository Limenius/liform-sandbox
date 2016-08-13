require('../sass/layout.scss');
var React = require('react');
var ReactDOM = require('react-dom');

require('json-editor/dist/jsoneditor.js');

import {createStore, combineReducers} from 'redux';
import {reducer as formReducer} from 'redux-form';
import { Provider } from 'react-redux';

const reducers = {
  // ... your other reducers here ...
  form: formReducer
}
const reducer = combineReducers(reducers);
const initialState = {
    form: {initialValues: window.initialValues}
};
const store = createStore(reducer, initialState);

import Liform from 'liform-react';

var schema = window.schema;

const submit = (values, dispatch) =>
{
    return new Promise((resolve, reject) => {
        fetch("/car", {
            method: "POST",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(values)
        })
        .then(function(response) {
            if (response.status == 400) {
                reject({name: 'wrong'});
            }
            resolve();
        });
    })
}

ReactDOM.render(
    <Provider store={store}>
        <Liform schema={schema} handleSubmit={submit} mapStateToProps={(state) => ({initialValues: state.form.initialValues})}/>
    </Provider>,
    document.getElementById('editor_holder')
);

//var JSONEditor = window.JSONEditor;
//
//JSONEditor.defaults.options.theme = 'bootstrap3';
//
//$().ready(function() {
//var element = document.getElementById('editor_holder');
//
//
//var editor = new JSONEditor(element,{
//    schema: schema,
//    showErrors: 'always'
//});
//    //{
//    //    type: "object",
//    //    title: "Car",
//    //    properties: {
//    //        make: {
//    //            type: "string",
//    //            enum: [
//    //                "Toyota",
//    //                "BMW",
//    //                "Honda",
//    //                "Ford",
//    //                "Chevy",
//    //                "VW"
//    //            ]
//    //            },
//    //            model: {
//    //                type: "string"
//    //            },
//    //            year: {
//    //                type: "integer",
//    //                enum: [
//    //                    1995,1996,1997,1998,1999,
//    //                    2000,2001,2002,2003,2004,
//    //                    2005,2006,2007,2008,2009,
//    //                    2010,2011,2012,2013,2014
//    //                    ],
//    //                    default: 2008
//    //                }
//    //            }
//    //        }
//    //    });
//
//        // Hook up the submit button to log to the console
//        //document.getElementById('submit').addEventListener('click',function() {
//        //    // Get the value from the editor
//        //    console.log(editor.getValue());
//        //});
//    });
