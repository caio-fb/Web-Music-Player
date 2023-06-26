
import { useEffect, useState } from "react";
import HeaderAdmin from "../../components/headerAdmin";

function Admin(){
    const generos = ["Sertanejo", "Rock", "Pop", "Forró", "Funk", "MPB", "RAP", "Pagode", "Samba"];

    const [nome, setNome] = useState('');
    const [artista, setArtista] = useState('');
    const [genero, setGenero] = useState('');
    const [link, setLink] = useState('');

    const enviaMusica = (e) => {
        e.preventDefault();
      
        const formData = new URLSearchParams();
        formData.append('nome', nome);
        formData.append('artista', artista);
        formData.append('genero', genero);
        formData.append('link', link);
      
        fetch('http://localhost:9090/RegisterMusic.php', {
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
        <div>
            <HeaderAdmin/>
            <div className="container pt-5">
                <form onSubmit={enviaMusica}>
                    <div className="pt-3">
                        <h3>Nome da música</h3>
                        <input type="text" placeholder="Rei do gado" name='nome' value={nome} onChange={(e) => setNome(e.target.value)}/>
                    </div>
                    <div className="pt-3">
                        <h3>Nome do artista</h3>
                        <input type="text" placeholder="Tião Carreiro" name='artista' value={artista} onChange={(e) => setArtista(e.target.value)}/>
                    </div>
                    <div className="pt-3">
                        <h3>Gênero</h3>
                        <select name='genero' value={genero} onChange={(e) => setGenero(e.target.value)}>
                            <option>Escolha um gênero</option>
                            {generos.map((genero)=>{
                                return(
                                    <option value={genero}>
                                        {genero}
                                    </option>
                                )
                            })}
                        </select>
                    </div>
                    <div className="pt-3">
                        <h3>Link do vídeo</h3>
                        <input type="text" placeholder="watch?v=bv3593lmltY" name='link' value={link} onChange={(e) => setLink(e.target.value)}/>
                    </div>
                    <div className="pt-3 ps-4">
                        <button type="submit" className="bg-orange rounded-5 text-white border-0" >
                            <b>Cadastrar música</b>
                        </button>
                    </div>
                </form>                
            </div>
        </div>
    );
}

export default Admin;