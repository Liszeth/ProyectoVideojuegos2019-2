using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class PersonajeController : MonoBehaviour
{
    private CamaraController poscamara;
    //poss
    public GameObject newPosPersonaje;
    //
    public GameObject smsEspada;
    public GameObject smsBala;
    public GameObject textoFin;
    public GameObject textoFin1;
    public GameObject pasarNivel;
    public GameObject smsEmpujar;
    public GameObject cargarCaja;
    public GameObject smsPuenteActivado;
    public GameObject ObjetoRecoger;
    public GameObject ObjetoCogido;
    //------------
    public GameObject BalDer;
    public GameObject BalIzq;
    public Transform TransBalaDer;
    public Transform TransBalaIzq;

    public Transform manosDer;
    public Transform manosIzq;

    private GenerarMonedaController genMoneda;
    public AudioClip clipVida;
    public AudioClip clipGanar;
    public AudioClip clipPerder;
    public AudioClip clipEmpujar;
    public AudioClip clipMoneda;
    public AudioClip clipDisparo;
    public AudioClip clipEspada;
    public AudioClip clipLlave;
    public AudioClip clipResorte;
    public AudioClip clipRomperPiso;

    private CircleCollider2D ataqueEspadaRight;
    private CircleCollider2D ataqueEspadaLeft;

    private AudioSource sonido;
    private Rigidbody2D rb;
    private Animator anim;
    private Transform trans;
    private SpriteRenderer sr;


    private bool atacando = false;
    private bool disparando = false;

    private bool escalando = false;
    private bool destroyCaja = false;
    private bool herido = false;
    public bool recogiendolos = false;

    private int fuerzaSalto = 12;
    private int velocidad = 5;
    private int numSaltos = 0;
    private int velocidadX = 5;
    private int velocidadY = 5;
    private int direccionEmpujar = 0;
    private int direccionBala = 0;


    private int llaves = 3;
    public Text TextoNumLlaves;
    private int puntos = 0;
    public Text textoPuntaje;
    private int vidas = 5;
    public Text textoVida;

    public float contadorTiempo = 0;
    void Start()
    {
        sonido = GetComponent<AudioSource>();
        rb = GetComponent<Rigidbody2D>();
        anim = GetComponent<Animator>();
        trans = GetComponent<Transform>();
        sr = GetComponent<SpriteRenderer>();

        genMoneda = FindObjectOfType(typeof(GenerarMonedaController)) as GenerarMonedaController;
        poscamara = FindObjectOfType(typeof(CamaraController)) as CamaraController;

        ataqueEspadaRight = transform.GetChild(2).GetComponent<CircleCollider2D>();
        ataqueEspadaLeft = transform.GetChild(3).GetComponent<CircleCollider2D>();

        ataqueEspadaRight.enabled = false;
        ataqueEspadaLeft.enabled = false;

        llaves = 0;
        TextoNumLlaves.text = llaves.ToString();

        puntos = 0;
        textoPuntaje.text = puntos.ToString();

        vidas = 15;
        textoVida.text = vidas.ToString();
    }

    // Update is called once per frame
    void Update()
    {
        if(herido == false)
        {
            if (escalando)
            {
                Escalar();
            }
            else
            {
                if (atacando)
                    Atacar();
                if (disparando)
                    Disparar();
                if (recogiendolos)
                    Empujar();
                    
                Correr();
                Saltar();

            }
        }
        if(vidas < 1)
        {
            Invoke("GameOver", 0.5f);
            sonido.PlayOneShot(clipPerder);
        }
        
    }
    //Colisiones
    void OnCollisionEnter2D(Collision2D collision)
    {
        if (collision.gameObject.tag == "fondo")
        {
            Invoke("VolverCargarEscena", 0.5f);
        }
        if (collision.gameObject.tag == "enemigo1")
        {
            Destroy(collision.gameObject);
            vidas = vidas - 1;
            textoVida.text = vidas.ToString();
        }
        if (collision.gameObject.tag == "bola_tierra")
        {
            Destroy(collision.gameObject);
            vidas = vidas - 1;
            textoVida.text = vidas.ToString();
        }
        if (collision.gameObject.tag == "suelo" || collision.gameObject.tag == "suelo_mov")
        {
            numSaltos = 0;
            anim.SetInteger("Estado", 0);
            herido = false;
        }
        if(collision.gameObject.tag == "cofre")
        {            
            Destroy(collision.gameObject);
            Invoke("Trasportar1", 0.4f);
            destroyCaja = true;
            genMoneda.generando = true;
        }
        if (collision.gameObject.tag == "box_moneda" && destroyCaja == true)
        {
            Destroy(collision.gameObject);
            
        }
        if(collision.gameObject.tag == "resorte")
        {
            rb.AddForce(new Vector2(0f, 1000f));
            anim.SetInteger("Estado", 2);
            sonido.PlayOneShot(clipResorte);
        }
        //Escena Fin
        if (collision.gameObject.tag == "tronco")
        {
            rb.AddForce(new Vector2(0f, 1000f));
            anim.SetInteger("Estado", 2);
        }

        if (collision.gameObject.tag == "fragil")
        {
            sonido.PlayOneShot(clipRomperPiso);
        }
        

    }

    //Colisiones Triggers
    void OnTriggerEnter2D(Collider2D col)
    {
        if (col.gameObject.tag == "puas")
        {
            vidas = vidas - 1;
            textoVida.text = vidas.ToString();
        }
        if (col.gameObject.tag == "piedra")
        {
            vidas = vidas - 1;
            textoVida.text = vidas.ToString();
        }
        if (col.gameObject.tag == "espadaene")
        {
            vidas = vidas - 1;
            textoVida.text = vidas.ToString();
        }
        if (col.gameObject.tag == "quita_puntos")
        {
            Destroy(col.gameObject);
            vidas= vidas-1;
            textoVida.text = vidas.ToString();
        }
        if (col.gameObject.tag == "vida")
        {
            sonido.PlayOneShot(clipVida);
            Destroy(col.gameObject);
            vidas++;
            textoVida.text = vidas.ToString();
        }
        if (col.gameObject.tag == "coger_espada")
        {
            Destroy(col.gameObject);
            Destroy(GameObject.Find(textoFin.name + "(Clone)"));
            smsEspada.GetComponent<TextMesh>().text = "!Ahora Puedes \n" + "Usar Tu espada!";
            MostrarTextoFin();
            atacando = true;
        }
        if (col.gameObject.tag == "coger_bala")
        {
            Destroy(col.gameObject);
            Destroy(GameObject.Find(textoFin.name + "(Clone)"));
            smsEspada.GetComponent<TextMesh>().text = "!Ahora Puedes \n" + "Usar Tus Balas!";
            MostrarTextoFin();
            disparando = true;
        }

        if (col.gameObject.tag == "pos_traslate")
        {
            trans.position = new Vector2(newPosPersonaje.GetComponent<Transform>().position.x, newPosPersonaje.GetComponent<Transform>().position.y);
                
        }
        if(col.gameObject.tag == "bandera_fin")
        {
            Destroy(GameObject.Find(textoFin.name + "(Clone)"));
            smsEmpujar.GetComponent<TextMesh>().text = "!Empuja la Puerta \n" + "Hasta el Contorno!";
            MostrarTextoFin();
        }
        if (col.gameObject.tag == "mensaje_caja")
        {
            Destroy(GameObject.Find(textoFin.name + "(Clone)"));
            cargarCaja.GetComponent<TextMesh>().text = "!LLeva la caja\n" + "Hasta el Contorno!";
            MostrarTextoFin();
        }
        //Nivel 2
        if (col.gameObject.tag == "puerta_fin" && llaves == 3)
        {
            Invoke("CargarNivel2", 0.5f);
        }
        if(col.gameObject.tag == "puerta_fin" && llaves < 3)
        {
            
            Destroy(GameObject.Find(textoFin.name + "(Clone)"));
            textoFin.GetComponent<TextMesh>().text = "  Te faltan " + 
                ((3 - llaves).ToString() + " Llaves \n" + "Para pasar a otro Nivel");
            MostrarTextoFin();
        }
        //Nivel 3
        if(col.gameObject.tag == "puerta_fin2" && llaves == 3)
        {
            Invoke("CargarNivel3", 0.5f);
        }

        if (col.gameObject.tag == "puerta_fin2" && llaves < 3)
        {

            Destroy(GameObject.Find(textoFin.name + "(Clone)"));
            textoFin1.GetComponent<TextMesh>().text = "  Te faltan " +
                ((3 - llaves).ToString() + " Llaves \n" + "Para pasar a otro Nivel");
            MostrarTextoFin();
        }

        //Fin
        if (col.gameObject.tag == "puerta_fin3" && llaves == 3)
        {
            sonido.PlayOneShot(clipGanar);
            Invoke("Fin", 0.5f);
        }

        if (col.gameObject.tag == "puerta_fin3" && llaves < 3)
        {

            Destroy(GameObject.Find(textoFin.name + "(Clone)"));
            textoFin1.GetComponent<TextMesh>().text = "  Te faltan " +
                ((3 - llaves).ToString() + " Llaves \n" + "Para pasar a otro Nivel");
            MostrarTextoFin();
        }
        //--------
        if (col.gameObject.tag == "llave")
        {
            sonido.PlayOneShot(clipLlave);
            Destroy(col.gameObject);
            llaves++;
            TextoNumLlaves.text = llaves.ToString();
        }

        if (col.gameObject.tag == "moneda")
        {
            sonido.PlayOneShot(clipMoneda);
            Destroy(col.gameObject);
            puntos += 2;
            textoPuntaje.text = puntos.ToString();
        }
        
        if (col.gameObject.tag == "escalera")
        {
            anim.SetInteger("Estado", 4);
            rb.gravityScale = 0;
            escalando = true;
            rb.velocity = new Vector2(0, 0);
        }
    }

    void OnTriggerStay2D(Collider2D colision)
    {
        if (colision.gameObject.tag == "escalera")
        {
            anim.SetInteger("Estado", 4);
            rb.gravityScale = 0;
            escalando = true;
        }
        
    }
    void OnTriggerExit2D(Collider2D colision)
    {
        if ((colision.gameObject.tag == "escalera"))
        {
            anim.SetInteger("Estado", 0);
            rb.gravityScale = 4;
            escalando = false;
        }
        if (colision.gameObject.tag == "explosion")
        {
            rb.gravityScale = 4;
            herido = false;
            numSaltos = 1;
        }
    }   

    void Disparar()
    {
        if (Input.GetKeyDown(KeyCode.D))
        {
            sonido.PlayOneShot(clipDisparo);
            anim.SetInteger("Estado", 3);
            if (direccionBala == 0)
                Instantiate(BalDer, TransBalaDer.position, Quaternion.identity);
            if (direccionBala == 1)
                Instantiate(BalIzq, TransBalaIzq.position, Quaternion.identity);
        }
        if (Input.GetKeyUp(KeyCode.D))
        {
            anim.SetInteger("Estado", 0);
        }
    }

    void Empujar()
    {
        if (ObjetoRecoger != null && ObjetoRecoger.GetComponent<EmpujarPuertaController>().isPickable == true && ObjetoCogido == null)
        {
            if (Input.GetKeyDown(KeyCode.C))
            {
                sonido.PlayOneShot(clipEmpujar);
                anim.SetInteger("Estado", 5);
                ObjetoCogido = ObjetoRecoger;
                ObjetoCogido.GetComponent<EmpujarPuertaController>().isPickable = false;
                
                //ObjetoCogido.transform.position = zonaInteraccion.position;
                ObjetoCogido.GetComponent<Rigidbody2D>().useAutoMass = false;
                ObjetoCogido.GetComponent<Rigidbody2D>().isKinematic = true;
                if(direccionEmpujar == 0)
                {
                    ObjetoCogido.transform.SetParent(manosDer);
                    rb.velocity = new Vector2(5, rb.velocity.y);
                }else if(direccionEmpujar == 1)
                {
                    ObjetoCogido.transform.SetParent(manosIzq);
                    rb.velocity = new Vector2(-5, rb.velocity.y);
                }
                
                
            }
        }
        else if (ObjetoCogido != null)
        {
            if (Input.GetKeyUp(KeyCode.C))
            {
                anim.SetInteger("Estado", 0);
                ObjetoCogido.GetComponent<EmpujarPuertaController>().isPickable = true;
                ObjetoCogido.transform.SetParent(null);
                ObjetoCogido.GetComponent<Rigidbody2D>().useAutoMass = true;
                ObjetoCogido.GetComponent<Rigidbody2D>().isKinematic = true;
                ObjetoCogido = null;
            }
        }
    }

    //Atacar
    void Atacar()
    {
        escalando = false;
        if (Input.GetKey(KeyCode.A) && sr.flipX == false)
        {
            anim.SetInteger("Estado", 3);
            ataqueEspadaRight.enabled = true;
        }
        if (Input.GetKey(KeyCode.A) && sr.flipX == true)
        {
            anim.SetInteger("Estado", 3);
            ataqueEspadaLeft.enabled = true;
        }
        if (Input.GetKeyUp(KeyCode.A))
        {
            anim.SetInteger("Estado", 0);
            ataqueEspadaRight.enabled = false;
            ataqueEspadaLeft.enabled = false;
        }
    }

    void Rebote()
    {
        if (contadorTiempo < 1)
        {            
            rb.AddForce(new Vector2(-2f, 38f));
        }
        if (contadorTiempo > 1)
        {
            rb.AddForce(new Vector2(0, 0));
            rb.gravityScale = 4;
        }
    }
    void Correr()
    {
        if (Input.GetKey(KeyCode.RightArrow))
        {
            
            rb.velocity = new Vector2(velocidad, rb.velocity.y);
            anim.SetInteger("Estado", 1);
            sr.flipX = false;
            direccionEmpujar = 0;
            direccionBala = 0;
            //direccionDeslizar = 0;
            //direccionRebote = 0;
        }
        if (Input.GetKey(KeyCode.LeftArrow))
        {
            rb.velocity = new Vector2(velocidad * -1, rb.velocity.y);
            anim.SetInteger("Estado", 1);
            sr.flipX = true;
            direccionEmpujar = 1;
            direccionBala = 1;
            //direccionDeslizar = 1;
            //direccionRebote = 1;
        }
        if (Input.GetKeyUp(KeyCode.RightArrow) || Input.GetKeyUp(KeyCode.LeftArrow))
        {
            rb.velocity = new Vector2(velocidad * 0, rb.velocity.y);
            anim.SetInteger("Estado", 0);
        }
    }

    void Saltar()
    {
        if (Input.GetKeyUp(KeyCode.UpArrow) && numSaltos < 2)
        {
            anim.SetInteger("Estado", 2);
            rb.velocity = new Vector2(rb.velocity.x, fuerzaSalto);
            numSaltos++;
        }
    }

    //Escalar
    void Escalar()
    {

        escalando = true;
        if (Input.GetKey(KeyCode.UpArrow))
        {
            anim.SetInteger("Estado", 4);
            rb.velocity = new Vector2(0, velocidadY);
            rb.gravityScale = 0;
        }
        if (Input.GetKey(KeyCode.DownArrow))
        {
            anim.SetInteger("Estado", 4);
            rb.velocity = new Vector2(0, -1 * velocidadY);
            rb.gravityScale = 0;
        }
        else if (Input.GetKeyUp(KeyCode.UpArrow) || Input.GetKeyUp(KeyCode.DownArrow))
        {
            rb.velocity = new Vector2(0, 0);
            rb.gravityScale = 0;
            escalando = false;
        }

        //en X
        if (Input.GetKey(KeyCode.RightArrow))
        {
            anim.SetInteger("Estado", 4);
            rb.velocity = new Vector2(velocidadX, 0);
            rb.gravityScale = 0;
        }
        if (Input.GetKey(KeyCode.LeftArrow))
        {
            anim.SetInteger("Estado", 4);
            rb.velocity = new Vector2(velocidadX * -1, 0);
            rb.gravityScale = 0;
        }
        else if (Input.GetKeyUp(KeyCode.RightArrow) || Input.GetKeyUp(KeyCode.LeftArrow))
        {

            rb.velocity = new Vector2(0, 0);
            rb.gravityScale = 0;
            escalando = false;
        }
    }



    //Teletransportar
    public void Trasportar1()
    {
        trans.position = new Vector2(24.1f, -2.03f);
    }

    //Mostrar Mensaje
    public void MostrarTextoFin()
    {
        GameObject texto = Instantiate(textoFin);
        texto.transform.position = new Vector2(this.gameObject.transform.position.x, 
            this.gameObject.transform.position.y + 2);
    }

    void CargarNivel2()
    {
        SceneManager.LoadScene("Nivel2");
    }
    void CargarNivel3()
    {
        SceneManager.LoadScene("Nivel3");
    }
    void Fin()
    {
        SceneManager.LoadScene("Fin");
    }
    void GameOver()
    {
        SceneManager.LoadScene("GameOver");
    }

    void VolverCargarEscena()
    {
        vidas = vidas - 1;
        trans.position = new Vector2(poscamara.minCamPos.x, poscamara.minCamPos.y);
    }
}
