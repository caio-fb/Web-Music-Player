import Logo from "../../assets/icons/WebPlayer.svg";
import Face from "../../assets/icons/face.svg";
import MusicDropdown from "../MusicDropdown";


import { useState, useEffect } from "react";

function Header(){
    const [search, setSearch] = useState();
    const [searchResult, setSearchResult] = useState([]);

    useEffect(()=>{
        buscaMusica();
    }, [search]);

    const buscaMusica = () => {
    
        const formData = new URLSearchParams();
        formData.append('search', search);
    
        fetch('http://localhost:9090/Music/SearchMusic.php', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            setSearchResult(data);
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
                                onChange={(e)=>{setSearch(e.target.value)}}
                            />                        
                        </form>
                        <div className="p-1 bg-light-gray rounded-circle px-2">
                            <img src={Face} width="50px" height="50px"/>
                        </div>                        
                    </div>                    
                </div>
            </nav>
            {searchResult.length > 0 && search && (
                <div>
                    <ul>
                        {searchResult.map((result, index) => (
                            <li key={index}>
                                {result[1]} - {result[2]} 
                                <span >
                                    <MusicDropdown musica_id={result[0]}  />
                                </span>                    
                            </li>
                        ))}
                    </ul>
                </div>
                ) 

            }   
        </header>
    );
}

export default Header;