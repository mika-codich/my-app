import React, {Component} from 'react';

import './Welcome.css';

class Welcome extends Component {
  render() {
    return (
      <div className="row " id="Body">
        <div className="medium-12 columns">
          <h2 id="welcomeText">Начальная страница входа для регистрации и Авторизации</h2>

          <a href="/login" className="button">Войти</a>
          <a href="/signup" className="button success">Зарегестрироваться</a>
        </div>
      </div>
    );
  }
}

export default Welcome;