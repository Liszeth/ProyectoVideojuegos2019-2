using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PiedraController : MonoBehaviour
{
    public float velocidadX = 4;
    public float velocidadY = 2;
    public float conTime = 0;
    private Rigidbody2D rb;
    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
    }

    // Update is called once per frame
    void Update()
    {
        conTime += Time.deltaTime;
        Lanzamiento();
        Destruir();
        
    }
    void Lanzamiento()
    {
        if (conTime < 2)
        {
            rb.AddForce(new Vector2(velocidadX, velocidadY));
            rb.gravityScale = 0;
        }
        else
        {
            rb.AddForce(new Vector2(0, 0));
            rb.gravityScale = 1;
        }
    }
    void Destruir()
    {
        if(conTime > 4)
        {
            Destroy(gameObject);
        }
    }
}
