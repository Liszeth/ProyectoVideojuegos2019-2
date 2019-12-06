using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class EneArcoController : MonoBehaviour
{
    private PersonajeController personaje;
    private Animator anim;
    private Rigidbody2D rb;
    private SpriteRenderer sr;
    private Transform trans;

    public GameObject flecha_izq;
    public GameObject flecha_der;
    public Transform trans_izq;
    public Transform trans_der;

    public float velocidad = 0;
   // public float tiempoCrear = 0;
    public float fuerzaSalto = 0;

    private float diferenciaDistX;
    public float diferenciaDistY;
    private int numHeridas = 0;
    private float contadorTiempo = 0;
    private float posIniX;
    private float posIniY;
    private int dirDisparo = 0;

    private bool disparando = false;
    void Start()
    {
        sr = GetComponent<SpriteRenderer>();
        rb = GetComponent<Rigidbody2D>();
        anim = GetComponent<Animator>();
        trans = GetComponent<Transform>();
        personaje = FindObjectOfType(typeof(PersonajeController)) as PersonajeController;

        posIniX = trans.position.x;
        posIniY = trans.position.y;
    }

    // Update is called once per frame
    void Update()
    {
        contadorTiempo = Time.deltaTime;
        diferenciaDistX = trans.position.x - personaje.transform.position.x;
        diferenciaDistY = personaje.transform.position.y - trans.position.y;
        Disparar();

    }
    void Awake()
    {
    }
    void Disparar()
    {
        disparando = true;
        if (diferenciaDistX < 5 && diferenciaDistX > 0)
        {
            Instantiate(flecha_izq, trans_izq.position, Quaternion.identity);
            if (contadorTiempo == 5)
            {
                
                contadorTiempo = 0;
            }
            anim.SetInteger("EstadoE2", 1);
            sr.flipX = true;
            dirDisparo = 0;
            disparando = true;
        }
        else if (diferenciaDistX < 0 && diferenciaDistX > -5)
        {
            anim.SetInteger("EstadoE2", 1);
            sr.flipX = false;
            dirDisparo = 1;
            disparando = true;
        }
        else if (diferenciaDistX > 4 || diferenciaDistX < -5)
        {
            anim.SetInteger("EstadoE2", 0);
            trans.position = new Vector2(posIniX, posIniY);
            disparando = false;
        }
    }
    void Saltar()
    {
        if (diferenciaDistY > 1 && diferenciaDistY < 4.5f)
        {
            anim.SetInteger("EstadoE2", 1);
            rb.velocity = new Vector2(rb.velocity.x, fuerzaSalto);
            sr.flipX = true;
            disparando = true;
        }
        else if (diferenciaDistY > 1 && diferenciaDistY < 4.5f)
        {
            anim.SetInteger("EstadoE2", 1);
            rb.velocity = new Vector2(rb.velocity.x, fuerzaSalto);
            sr.flipX = false;
            disparando = true;
        }
    }


    void CrearFlecha()
    {
        if (dirDisparo == 0)
        {
            Instantiate(flecha_izq, trans_izq.position, Quaternion.identity);
        }
        else if (dirDisparo == 1)
        {
            Instantiate(flecha_der, trans_der.position, Quaternion.identity);
        }

    }

    void GenerarFlecha()
    {
        //InvokeRepeating("CrearFlecha", 0f, tiempoCrear);
    }

}
