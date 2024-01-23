import { useState, useEffect } from "react";
import Header from "../../components/Header";

function Home(){
  const [playlists, setPlaylists] = useState([]);

    const createPlaylist = ()=> {
        let nome = prompt("Digite o nome da Playlist");

        const formData = new URLSearchParams();
        formData.append('nome', nome);
    
        fetch('http://localhost:9090/Playlist/RegisterPlaylist.php', {
          method: 'POST',
          body: formData,
        })
          .then(() => {
          })
          .catch((error) => {
            console.log(error);
          });
    }

    const viewPlaylists = ()=>{
      fetch(`http://localhost:9090/Playlist/ViewAllPlaylists.php`)
        .then((response) => 
          response.json()
        )
        .then ((data)=>{
          setPlaylists([...data]);
        });
        }

    useEffect(()=>{
      viewPlaylists();
    }, []);
    

    return(
        <div>
            <Header/>
            <br/><br/><br/><br/><br/><br/>
            <button onClick={()=>{createPlaylist()}}>+</button>

            <br/><br/><br/><br/><br/><br/>
            <div>
              <h4>&lt;Playlists&gt;</h4>
            </div>
            <div>
              {playlists.length > 0 && (
                <div>{playlists.map((playlist) => <span key={playlist}> {playlist} </span>)}</div>                
              )}              
            </div>
        </div>
    );
}

export default Home;