using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class NinjaController : MonoBehaviour
{
    private PersonajeController personaje;
    private Rigidbody2D rb;
    private Animator anim;
    private SpriteRenderer sr;
    private Transform trans;

    private CircleCollider2D atqDer;
    private CircleCollider2D atqIzq;

    public float velocidad = 0;

    private float diferenciaDistX;
    private float diferenciaDistY;
    private int numHeridas = 0;
    private float contadorTiempo = 0;
    private bool estaHerido = false;
    private int dirAtaque = 0;
    void Start()
    {
        sr = GetComponent<SpriteRenderer>();
        rb = GetComponent<Rigidbody2D>();
        anim = GetComponent<Animator>();
        trans = GetComponent<Transform>();
        personaje = FindObjectOfType(typeof(PersonajeController)) as PersonajeController;

        atqDer = transform.GetChild(0).GetComponent<CircleCollider2D>();
        atqIzq = transform.GetChild(1).GetComponent<CircleCollider2D>();

        atqDer.enabled = false;
        atqIzq.enabled = false;

    }

    void Update()
    {
        diferenciaDistX = trans.position.x - personaje.transform.position.x;
        diferenciaDistY = trans.position.y - personaje.transform.position.y;
        if (estaHerido == false)
        {
            Correr();

        }
        else
        {
            contadorTiempo += Time.deltaTime;
            if (numHeridas > 0 && numHeridas <= 3)
            {
                Rebotar();
            }
            else if (numHeridas > 3)
            {
                Rebotar();
                Invoke("DestruirEnemigo", 1.5f);
            }
        }

    }
    void Correr()
    {
        if (diferenciaDistX < 5 && diferenciaDistX > 0 && diferenciaDistY < 2 && diferenciaDistY > -2)
        {
            anim.SetInteger("EstadoE1", 1);
            rb.velocity = new Vector2(velocidad, rb.velocity.y);
            sr.flipX = false;
            dirAtaque = 0;//izquierda
            atqDer.enabled = false;
            atqIzq.enabled = false;

        }
        else if (diferenciaDistX < 0 && diferenciaDistX > -5 && diferenciaDistY < 2 && diferenciaDistY > -2)
        {
            anim.SetInteger("EstadoE1", 1);
            rb.velocity = new Vector2(velocidad * -1, rb.velocity.y);
            sr.flipX = true;
            dirAtaque = 1;//derecha    
            atqDer.enabled = false;
            atqIzq.enabled = false;
        }
        else if (diferenciaDistX > 4 || diferenciaDistX < -5 || diferenciaDistY > 2 || diferenciaDistY < -2)
        {
            anim.SetInteger("EstadoE1", 0);
            rb.velocity = new Vector2(0, 0);
            //trans.position = new Vector2(posIniX, posIniY);
            atqDer.enabled = false;
            atqIzq.enabled = false;
        }

        //Condicion Atacar
        if (diferenciaDistX < 3 && diferenciaDistX > -3 && diferenciaDistY < 2 && diferenciaDistY > -2)
        {
            anim.SetInteger("EstadoE1", 2);
            if (dirAtaque == 0)
            {
                atqIzq.enabled = true;
            }
            else if (dirAtaque == 1)
            {
                atqDer.enabled = true;
            }
        }

    }
    void Rebotar()
    {
        if (contadorTiempo < 1)
        {
            anim.SetInteger("EstadoE1", 3);
            rb.AddForce(new Vector2(5, 10));
        }
        if (contadorTiempo > 1)
        {
            rb.AddForce(new Vector2(0, 0));
        }
    }


    void OnTriggerEnter2D(Collider2D colision)
    {
        if (colision.tag == "espada_personaje")
        {
            estaHerido = true;
            numHeridas++;
        }
        if (colision.gameObject.tag == "bala")
        {
            estaHerido = true;
            numHeridas++;
            Destroy(colision.gameObject);
        }
    }

    void OnCollisionEnter2D(Collision2D collision)
    {
        if (collision.gameObject.tag == "suelo")
        {
            estaHerido = false;
            contadorTiempo = 0;
        }
    }

    void DestruirEnemigo()
    {
        Destroy(gameObject);
    }
}
