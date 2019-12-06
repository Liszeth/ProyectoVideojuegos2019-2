using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class HongoController : MonoBehaviour
{
    private Rigidbody2D rb;
    private SpriteRenderer sr;
    private Animator anim;
    public float velocidad = 0;
    void Start()
    {
        sr = GetComponent<SpriteRenderer>();
        rb = GetComponent<Rigidbody2D>();
        anim = GetComponent<Animator>();
        sr.flipX = false;
    }

    
    void Update()
    {
        rb.velocity = new Vector2(velocidad * -1, rb.velocity.y);
    }

    void OnTriggerEnter2D(Collider2D colision)
    {
        if (colision.gameObject.tag == "rebote")
        {
            sr.flipX = !sr.flipX;
            velocidad = velocidad * -1;
        }
        if (colision.gameObject.tag == "bala")
        {
            Destroy(gameObject);
            Destroy(colision.gameObject);
        }
        if (colision.gameObject.tag == "espada_personaje")
        {
            Destroy(gameObject);
        }
    }

    

}
