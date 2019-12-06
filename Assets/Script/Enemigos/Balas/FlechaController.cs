using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FlechaController : MonoBehaviour
{
    public float velocidadX = 4;
    public float conTime = 0;
    private Rigidbody2D rb;
    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
    }

    
    void Update()
    {
        conTime += Time.deltaTime;
        Lanzamiento();
        Destruir();
    }

    void Lanzamiento()
    {
        rb.velocity = new Vector2(velocidadX, rb.velocity.y);

    }
    void Destruir()
    {
        if (conTime > 4)
        {
            Destroy(gameObject);
        }
    }
}
