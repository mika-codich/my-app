import React, {Component} from 'react';
import {PostData} from '../../services/PostData';
import {Redirect} from 'react-router-dom';
import './Signup.css';

class Signup extends Component {

  constructor(props){
    super(props);
   
    this.state = {
     username: '',
     password: '',
     email: '',
     name: '',
     redirectToReferrer: false
    };

    this.signup = this.signup.bind(this);
    this.onChange = this.onChange.bind(this);

  }
 

  signup() {
    if(this.state.username && this.state.password && this.state.email && this.state.name){
    PostData('signup',this.state).then((result) => {
      let responseJson = result;
      if(responseJson.userData){         
        sessionStorage.setItem('userData',JSON.stringify(responseJson));
        this.setState({redirectToReferrer: true});
      }
      
     });
    }
  }

 onChange(e){
   this.setState({[e.target.name]:e.target.value});
  }

  render() {
    if (this.state.redirectToReferrer || sessionStorage.getItem('userData')) {
      return (<Redirect to={'/home'}/>)
    }
   
  

    return (
      
      <div className="row " id="Body">
        <div className="medium-5 columns left">
        <h4>Регистрация</h4>
        <label>Email</label>
        <input type="text" name="email"  placeholder="Email" onChange={this.onChange}/>
        <label>Фио</label>
        <input type="text" name="name"  placeholder="Имя" onChange={this.onChange}/>
        <label>Ник</label>
        <input type="text" name="username" placeholder="Ник" onChange={this.onChange}/>
        <label>Пароль</label>
        <input type="password" name="password"  placeholder="Пароль" onChange={this.onChange}/>
        <label>Повтор пароля</label>
        <input type="password" name="return_password"  placeholder="Поавтор пароля" onChange={this.onChange}/>
        
        <input type="submit" className="button" value="Зарегестрироваться" onClick={this.signup}/>
        <a href="/login">Войти</a>
        </div>
        
      </div>
    );
  }
}

export default Signup;