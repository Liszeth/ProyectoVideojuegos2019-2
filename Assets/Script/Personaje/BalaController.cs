using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BalaController : MonoBehaviour
{
    private Rigidbody2D rb;
    public int velocidad = 0;
    private float conTime = 0;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
    }

    // Update is called once per frame
    void Update()
    {
        conTime += Time.deltaTime;
        if(conTime < 3)
        {
            rb.velocity = new Vector2(velocidad, rb.velocity.y);
            rb.gravityScale = 0;
        }else
        {
            Destroy(gameObject);
        }
    }
}
