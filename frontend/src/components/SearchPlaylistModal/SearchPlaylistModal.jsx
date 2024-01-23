import { useState, useEffect } from "react";

function SearchPlaylistModal (props) {
    const [search, setSearch] = useState('');
    const [searchResult, setSearchResult] = useState([]);

    useEffect(()=>{
      findPlaylist();
    }, [search]);

    const findPlaylist = () => {
    
        const formData = new URLSearchParams();
        formData.append('search', search);
    
        fetch('http://localhost:9090/Playlist/SearchPlaylist.php', {
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

    const addMusicInPlaylist = (playlist_id) => {

        
        const formData = new URLSearchParams();
        formData.append('musica_id', props.musica_id);
        formData.append('playlist_id', playlist_id);
    
        fetch('http://localhost:9090/Playlist_Music/RegisterPlaylistMusic.php', {
          method: 'POST',
          body: formData,
        })
          .then(() => {
          })
          .catch((error) => {
            console.log(error);
          });
    }
    
    return (
      <div className="container">
        <div className="text-center">
          <input className=" me-2 rounded-5 text-center px-5" type="search" placeholder="Buscar playlist" 
            onChange={(e)=>{setSearch(e.target.value)}}
          />
          <br/> <br/> 
          {searchResult.length > 0 && search && (
                <div>
                  {searchResult.map((result, index) => (
                    <div>
                      <button key={index} onClick={()=>{addMusicInPlaylist(result[0])}}>
                        {result[1]}                                                
                      </button> 
                      <br/><br/>
                    </div>
                  ))}
                </div>
                ) 

            }   
        </div>
      </div>
    );
  };

  export default SearchPlaylistModal;