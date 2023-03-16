import React from 'react'

export default function Signup() {

  const onSubmit = (ev) =>{
    ev.preventDefault()

  }
  return (
    <div className='login-signup-form animated fadeInDown'>
        <div>
          <form onSubmit={onSubmit}>
            <h1 className="title">
              Signup for free
            </h1>
             <input type="email" placeholder='Email'/>
             <input type="password" placeholder='Password'/>
             <button className="btn btn-block">Signup</button>
             <p className="message">
               Already Registered? <Link to="/login">Sign in</Link>
             </p>
          </form>
        </div>
    </div>
  )
}