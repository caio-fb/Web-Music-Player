import Logo from "../../assets/icons/WebPlayer.svg";
import Face from "../../assets/icons/face.svg";


import { useState, useEffect } from "react";

function Header(){
    const [search, setSearch] = useState();

    useEffect(()=>{
        console.log(search);
    }, [setSearch]);

    const buscaMusica = (e) => {
        e.preventDefault();
      
        const formData = new URLSearchParams();
        formData.append('search', search);
      
        fetch('http://localhost:9090/SearchMusic.php', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
          })
          .catch((error) => {
            console.log(error);
          });
      };
    return(
        <header className="bg-orange">
            <nav className="navbar">
                <div className="container-fluid">
                    <h2 className="text-center text-white">
                        <img src={Logo}/>
                        WebPlayer
                    </h2>
                    <div className="d-flex">
                        <form className="d-flex m-3" >
                            <input className=" me-2 rounded-5 text-center px-5" type="search" placeholder="Search" 
                                onChange={(e)=>{setSearch(e)}}
                            />                        
                        </form>
                        <div className="p-1 bg-light-gray rounded-circle px-2">
                            <img src={Face} width="50px" height="50px"/>
                        </div>                        
                    </div>                    
                </div>
                </nav>
        </header>
    );
}

export default Header;