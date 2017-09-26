import React from 'react';
import { Route, BrowserRouter as Router } from 'react-router-dom';
import { Provider } from 'react-redux';

import Main from './containers/Main';

const App = ({ store }) => {
  return (
    <Provider store={store}>
      <Router>
        <Route exact path="/" component={Main} />
      </Router>
    </Provider>
  );
};

export default App;
