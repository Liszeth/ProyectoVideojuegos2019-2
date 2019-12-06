using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlataformaCaeController : MonoBehaviour
{
    private Rigidbody2D rb;
    private BoxCollider2D bc;
    private Vector2 start;

    public float tiempoCaer = 1f;
    public float tiempoAparecer = 5f;
    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        bc = GetComponent<BoxCollider2D>();
        start = transform.position;
    }

    
    void Update()
    {
        
    }
    
    void OnCollisionEnter2D(Collision2D collision)
    {
        if (collision.gameObject.CompareTag("personaje"))
        {
            Invoke("Caer", tiempoCaer);
            Invoke("Aparecer", tiempoCaer + tiempoAparecer);
            
        }
    }

    void Caer()
    {
        rb.isKinematic = false;
        bc.isTrigger = true;
    }

    void Aparecer()
    {
        transform.position = start;
        rb.isKinematic = true;
        rb.velocity = Vector2.zero;
        bc.isTrigger = false;
    }
}
